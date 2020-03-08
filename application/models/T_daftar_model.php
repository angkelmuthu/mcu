<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_daftar_model extends CI_Model
{

    public $table = 't_daftar';
    public $id = 'idreg';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('idreg,noreg,baru,dokter,bayar,rujukan,kdrujuk,tglreg,full_name as petugas,nomr,nik,nama,tgllhr,alamat,kodepos,kdklmn,kdkawin,hp,tglinput,kelamin,kawin,poli,unit');
        $this->datatables->from('v_pendaftaran');
        //add this line for join
        //$this->datatables->join('table2', 't_daftar.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t_daftar/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
            " . anchor(site_url('t_daftar/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
                " . anchor(site_url('t_daftar/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idreg');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        //$this->db->select('idreg,a.noreg,a.nomr,b.nik,b.nama,b.tgllhr,a.baru,a.kddokter,a.kdpoli,a.kdbayar,a.rujukan,a.kdrujuk,a.tglreg,a.id_users');
        $this->db->from('v_pendaftaran');
        //$this->db->join('m_pasien b', 'a.nomr = b.nomr', 'left');
        $this->db->where('idreg', $id);
        return $this->db->get()->row();
    }
    ////tarif
    function get_tarif($kdpoli)
    {
        $qry = "SELECT a.*,b.*,c.harga from m_tarif a LEFT JOIN m_poli b ON a.kdpoli = b.kdpoli
        LEFT JOIN m_tarifkelas c ON a.kdtarif = c.kdtarif and c.kdkelas=1
        where a.kdpoli IN ('4','5','$kdpoli')";
        $query = $this->db->query($qry);
        return $query->result();
        // $this->db->select('a.*,b.*,c.harga');
        // $this->db->from('m_tarif a');
        // $this->db->join('m_poli b', 'a.kdpoli = b.kdpoli', 'LEFT');
        // $this->db->join('m_tarifkelas c', 'a.kdtarif = c.kdtarif and c.kdkelas=1', 'LEFT');
        // $this->db->where('a.kdpoli', $kdpoli);
        //return $this->db->get()->result();
    }
    function get_dokter()
    {
        $qry = "SELECT a.kdjadwal,a.kddokter,b.dokter,a.jam_mulai,a.jam_akhir,a.kdpoli FROM m_dokterjadwal a
        LEFT JOIN m_dokter b ON a.kddokter=b.kddokter
        WHERE a.hari=date_format(now(),'%w')";
        $query = $this->db->query($qry);
        return $query->result();
    }
    ///////obat
    function get_obat()
    {
        $this->db->from('v_obatdetail');
        return $this->db->get()->result();
    }
    ///////////////////////////////////////////////
    function get_penunjang($noreg)
    {
        $this->db->from('v_penunjang');
        $this->db->where('noreg', $noreg);
        return $this->db->get()->result();
    }
    //////////////////////////////////////////////
    function barang_list($noreg, $kddokter)
    {
        $hasil = $this->db->query("SELECT *,a.harga as hargas FROM t_billrajal a LEFT JOIN m_tarif b on a.kdtarif=b.kdtarif where a.noreg='$noreg' and a.kddokter='$kddokter'");
        return $hasil->result();
    }

    function simpan_barang($nobill, $noreg, $kdpoli, $kddokter, $paket, $kdtarif, $harga, $qty, $kdbayar, $id_users, $tgl)
    {
        $hasil = $this->db->query("INSERT INTO t_billrajal (nobill,noreg,kdpoli,kddokter,paket,kdtarif,harga,qty,kdbayar,tglinput,id_users)VALUES('$nobill','$noreg','$kdpoli','$kddokter','$paket','$kdtarif','$harga','$qty','$kdbayar','$tgl', '$id_users')");
        return $hasil;
    }
    function update_barang($nobill, $noreg, $kdpoli, $kddokter, $paket, $kdtarif, $harga, $qty, $kdbayar, $id_users, $tgl)
    {
        $hasil = $this->db->query("update t_billrajal set qty='$qty',kdbayar='$kdbayar',tglinput='$tgl',id_users='$id_users' where noreg='$noreg' and nobill='$nobill' and kdtarif='$kdtarif' and kdpoli='$kdpoli' and kddokter='$kddokter'");
        return $hasil;
    }
    function hapus_barang($idbill)
    {
        $hasil = $this->db->query("DELETE FROM t_billrajal WHERE idbill='$idbill'");
        return $hasil;
    }
    //////////////////////icd////////////////////////////////////
    function list_icd($noreg, $kddokter)
    {
        $this->db->from('t_icd a');
        $this->db->JOIN('m_icd10 b', 'a.code=b.code', 'LEFT');
        $this->db->where('a.noreg', $noreg);
        $this->db->where('a.kddokter', $kddokter);
        $this->db->where('a.flag', 'icd10');
        $hasil = $this->db->get();
        return $hasil->result();
    }
    function simpan_icd($nobill, $noreg, $kddokter, $flag, $jns, $ket, $code, $tglinput)
    {
        $hasil = $this->db->query("INSERT INTO t_icd (noreg, nobill, kddokter, flag, jenis, ket, code, tglinput)VALUES('$noreg','$nobill','$kddokter','$flag','$jns','$ket','$code','$tglinput')");
        return $hasil;
    }
    function hapus_icd($idicd)
    {
        $hasil = $this->db->query("DELETE FROM t_icd WHERE id='$idicd'");
        return $hasil;
    }
    //////////////////////////////////////////////////////////////
    function list_icd9($noreg, $kddokter)
    {
        $this->db->from('t_icd a');
        $this->db->JOIN('m_icd10 b', 'a.code=b.code', 'LEFT');
        $this->db->where('a.noreg', $noreg);
        $this->db->where('a.kddokter', $kddokter);
        $this->db->where('a.flag', 'icd9');
        $hasil = $this->db->get();
        return $hasil->result();
    }
    function simpan_icd9($nobill, $noreg, $kddokter, $flag, $jns, $ket, $code, $tglinput)
    {
        $hasil = $this->db->query("INSERT INTO t_icd (noreg, nobill, kddokter, flag, jenis, ket, code, tglinput)VALUES('$noreg','$nobill','$kddokter','$flag','$jns','$ket','$code','$tglinput')");
        return $hasil;
    }
    function hapus_icd9($idicd)
    {
        $hasil = $this->db->query("DELETE FROM t_icd WHERE id='$idicd'");
        return $hasil;
    }
    //////////////////////obat////////////////////////////////////
    function obat_bill_list($noreg, $kddokter)
    {
        $hasil = $this->db->query("SELECT a.*,b.nmobat FROM t_billobat a
                LEFT JOIN m_obat b ON a.kdobat=b.kdobat where a.noreg='$noreg' and a.kddokter='$kddokter'");
        return $hasil->result();
    }

    function simpan_obat($nobill, $noreg, $kdpoli, $kddokter, $kdobat, $hargaobat, $qty, $kdbayar, $status, $tgl, $user)
    {
        $hasil = $this->db->query("INSERT INTO t_billobat (nobill, noreg, kdpoli, kddokter, kdobat, hargaobat, qty, kdbayar, status, tglinput, id_users)VALUES('$nobill','$noreg','$kdpoli','$kddokter','$kdobat',$hargaobat,'$qty', '$kdbayar','$status','$tgl','$user')");
        return $hasil;
    }
    function update_obat($nobill, $noreg, $kdpoli, $kddokter, $kdobat, $hargaobat, $qty, $kdbayar, $status, $tgl, $user)
    {
        $hasil = $this->db->query("update t_billobat set hargaobat='$hargaobat',qty='$qty', kdbayar='$kdbayar',id_users='$user' where noreg='$noreg' and nobill='$nobill' and kdobat='$kdobat' and kdpoli='$kdpoli' and kddokter='$kddokter'");
        return $hasil;
    }
    function hapus_obat($idbill)
    {
        $hasil = $this->db->query("DELETE FROM t_billobat WHERE idbill='$idbill'");
        return $hasil;
    }
    //////////////////////////////////////////////
    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('noreg', $q);
        $this->db->or_like('nomr', $q);
        $this->db->or_like('baru', $q);
        $this->db->or_like('kddokter', $q);
        $this->db->or_like('kdpoli', $q);
        $this->db->or_like('kdbayar', $q);
        $this->db->or_like('rujukan', $q);
        $this->db->or_like('kdrujuk', $q);
        $this->db->or_like('tglreg', $q);
        $this->db->or_like('id_users', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idreg', $q);
        $this->db->like('noreg', $q);
        $this->db->or_like('nomr', $q);
        $this->db->or_like('baru', $q);
        $this->db->or_like('kddokter', $q);
        $this->db->or_like('kdpoli', $q);
        $this->db->or_like('kdbayar', $q);
        $this->db->or_like('rujukan', $q);
        $this->db->or_like('kdrujuk', $q);
        $this->db->or_like('tglreg', $q);
        $this->db->or_like('id_users', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function search_icd10($title)
    {
        $this->db->like('description', $title, 'both');
        $this->db->or_like('code', $title, 'both');
        $this->db->order_by('code', 'ASC');
        $this->db->limit(10);
        return $this->db->get('m_icd10')->result();
    }
    ///////////////////////////////////////////////////////
    function ins_soap($data)
    {
        $this->db->insert('t_asessment', $data);
    }
    function updt_soap($idsoap, $data)
    {
        $this->db->where('id', $idsoap);
        $this->db->update('t_asessment', $data);
    }
    /* fungsi untuk memanggil data pada table provinsi*/
    function get_metode()
    {
        $this->db->from('m_bayar_metode');
        $this->db->where('aktif', 'Y');
        $this->db->where_not_in('kdmetodebayar', '1');
        $hasil = $this->db->get();
        return $hasil->result();
    }

    /* fungsi untuk memanggil data pada table kota*/
    function get_bayar($id)
    {
        $this->db->from('m_bayar');
        $this->db->where('kdmetodebayar', $id);
        $this->db->where('aktif', 'Y');
        $hasil = $this->db->get();
        return $hasil->result();
    }
    /* fungsi untuk memanggil data pada table provinsi*/
    function get_poli()
    {
        $this->db->from('m_poli');
        $hasil = $this->db->get();
        return $hasil->result();
    }

    /* fungsi untuk memanggil data pada table kota*/
    function get_jadwaldokter($id)
    {
        $qry = "SELECT a.kdjadwal,a.kddokter,b.dokter,a.jam_mulai,a.jam_akhir,a.kdpoli FROM m_dokterjadwal a
        LEFT JOIN m_dokter b ON a.kddokter=b.kddokter
        WHERE a.kdpoli='$id' and a.hari=date_format(now(),'%w')";
        $query = $this->db->query($qry);
        return $query->result();
        // $this->db->from('m_dokterjadwal');
        // $this->db->where('kdpoli', $id);
        // $this->db->where('aktif', 'Y');
        // $hasil = $this->db->get();
        // return $hasil->result();
    }
}

/* End of file T_daftar_model.php */
/* Location: ./application/models/T_daftar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-23 06:32:59 */
/* http://harviacode.com */
