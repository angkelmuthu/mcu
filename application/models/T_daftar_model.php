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

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get('v_pendaftaran')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get('v_pendaftaran')->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('idreg', $q);
        $this->db->or_like('noreg', $q);
        $this->db->or_like('nobill', $q);
        $this->db->or_like('nomr', $q);
        $this->db->or_like('baru', $q);
        $this->db->or_like('dokter', $q);
        $this->db->or_like('poli', $q);
        $this->db->or_like('bayar', $q);
        $this->db->or_like('rujukan', $q);
        $this->db->or_like('kdrujuk', $q);
        $this->db->or_like('tglreg', $q);
        $this->db->or_like('id_users', $q);
        $this->db->from('v_pendaftaran');
        return $this->db->count_all_results();
    }
    function total_rows_unit($unit, $q = NULL)
    {
        $this->db->where('kdunit', $unit);
        $this->db->group_start();
        $this->db->or_like('idreg', $q);
        $this->db->or_like('noreg', $q);
        $this->db->or_like('nobill', $q);
        $this->db->or_like('nomr', $q);
        $this->db->or_like('baru', $q);
        $this->db->or_like('dokter', $q);
        $this->db->or_like('poli', $q);
        $this->db->or_like('bayar', $q);
        $this->db->or_like('rujukan', $q);
        $this->db->or_like('kdrujuk', $q);
        $this->db->or_like('tglreg', $q);
        $this->db->or_like('id_users', $q);
        $this->db->group_end();
        $this->db->from('v_pendaftaran');
        return $this->db->count_all_results();
    }


    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {

        $this->db->order_by($this->id, $this->order);
        $this->db->like('idreg', $q);
        $this->db->or_like('noreg', $q);
        $this->db->or_like('nobill', $q);
        $this->db->or_like('nomr', $q);
        $this->db->or_like('baru', $q);
        $this->db->or_like('dokter', $q);
        $this->db->or_like('poli', $q);
        $this->db->or_like('bayar', $q);
        $this->db->or_like('rujukan', $q);
        $this->db->or_like('kdrujuk', $q);
        $this->db->or_like('tglreg', $q);
        $this->db->or_like('id_users', $q);
        $this->db->limit($limit, $start);
        return $this->db->get('v_pendaftaran')->result();
    }
    function get_limit_data_unit($limit, $start = 0, $unit, $q = NULL)
    {
        $this->db->where('kdunit', $unit);
        $this->db->order_by($this->id, $this->order);
        $this->db->group_start();
        $this->db->or_like('idreg', $q);
        $this->db->or_like('noreg', $q);
        $this->db->or_like('nobill', $q);
        $this->db->or_like('nomr', $q);
        $this->db->or_like('baru', $q);
        $this->db->or_like('dokter', $q);
        $this->db->or_like('poli', $q);
        $this->db->or_like('bayar', $q);
        $this->db->or_like('rujukan', $q);
        $this->db->or_like('kdrujuk', $q);
        $this->db->or_like('tglreg', $q);
        $this->db->or_like('id_users', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        return $this->db->get('v_pendaftaran')->result();
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
    ///////////////////////////////modifikasi///////////////////////////////////////////////
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
        $qry = "SELECT a.kdjadwal,a.kddokter,b.dokter,TIME_FORMAT(a.jam_mulai, '%H:%i') AS jam_mulai,TIME_FORMAT(a.jam_akhir, '%H:%i') as jam_akhir,a.kdpoli FROM m_dokterjadwal a
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
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-15 08:51:59 */
/* http://harviacode.com */
