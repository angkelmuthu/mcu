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
    function get_tarif()
    {
        $this->db->select('*');
        $this->db->from('m_tarif a');
        $this->db->join('m_poli b', 'a.kdpoli = b.kdpoli');
        return $this->db->get()->result();
    }
    function get_dokter()
    {
        $qry = "SELECT a.kdjadwal,a.kddokter,b.dokter,a.jam_mulai,a.jam_akhir,a.kdpoli FROM m_dokterjadwal a
        LEFT JOIN m_dokter b ON a.kddokter=b.kddokter
        WHERE a.hari=date_format(now(),'%w')";
        $query = $this->db->query($qry);
        return $query->result();
    }
    /////tarif paket
    function get_tarifpaket()
    {
        $hasil = $this->db->query("SELECT a.kdtarifpaket,a.nmpaket,c.kdtarif,c.nmtarif,sum(c.harga) as harga FROM m_tarifpaket a
        INNER JOIN m_tarifpaketdetail b ON a.kdtarifpaket=b.kdtarifpaket
        LEFT JOIN m_tarif c ON b.kdtarif=c.kdtarif GROUP BY a.kdtarifpaket");
        return $hasil->result();
    }
    ///////obat
    function get_obat()
    {
        $this->db->from('v_obatdetail');
        return $this->db->get()->result();
    }


    //////////////////////////////////////////////
    function barang_list($noreg)
    {
        $hasil = $this->db->query("SELECT *,a.harga as hargas FROM t_billrajal a LEFT JOIN m_tarif b on a.kdtarif=b.kdtarif LEFT JOIN m_poli c on b.kdpoli=c.kdpoli where a.noreg='$noreg' and a.paket='N'");
        return $hasil->result();
    }
    function paket_bill_list($noreg)
    {
        $hasil = $this->db->query("SELECT * FROM t_billrajal a LEFT JOIN m_tarif b ON a.kdtarif=b.kdtarif
        LEFT JOIN m_tarifpaket c ON c.kdtarifpaket=a.kdpaket WHERE a.paket='Y' and a.noreg='$noreg'");
        return $hasil->result();
    }

    function simpan_barang($nobill, $noreg, $paket, $kdpaket, $kdtarif, $harga, $qty, $kdbayar, $id_users, $tgl)
    {
        if ($paket == 'Y') {
            $qry = "SELECT '" . $noreg . "' AS noreg,'Y' AS paket,a.kdtarifpaket as kdpaket,a.kdtarif,b.harga,'" . $qty . "' AS qty, 'BL' AS status FROM m_tarifpaketdetail a
            LEFT JOIN m_tarif b ON a.kdtarif=b.kdtarif WHERE a.kdtarifpaket='" . $kdpaket . "'";
            //$qry = "SELECT kdtarifpaket as kdpaket,kdtarif FROM m_tarifpaketdetail WHERE kdtarifpaket=" . $kdpaket;
            $query = $this->db->query($qry);
            $hasil = array();
            foreach ($query->result() as $dat) {
                $hasil[] = array(
                    'nobill'   => $nobill,
                    'noreg'   => $dat->noreg,
                    'paket'   => $dat->paket,
                    'kdpaket'   => $dat->kdpaket,
                    'kdtarif'   => $dat->kdtarif,
                    'harga'   => $dat->harga,
                    'qty'   => $dat->qty,
                    'kdbayar'   => $kdbayar,
                    'status'   => $dat->status,
                    'tglinput'   => $tgl,
                    'id_users'   => $id_users
                );
            }
            $this->db->insert_batch('t_billrajal', $hasil);
            return $hasil;
        } else {
            $hasil = $this->db->query("INSERT INTO t_billrajal (nobill,noreg,paket,kdpaket,kdtarif,harga,qty,kdbayar,tglinput,id_users)VALUES('$nobill','$noreg','$paket','$kdpaket','$kdtarif','$harga','$qty','$kdbayar','$tgl', '$id_users')");
            return $hasil;
        }
    }
    function update_barang($nobill, $noreg, $paket, $kdpaket, $kdtarif, $harga, $qty, $kdbayar, $id_users, $tgl)
    {
        if ($paket == 'Y') {
            //$hasil = $this->db->query("update t_billrajal set qty='$qty' where noreg='$noreg' and kdpaket='$kdpaket'");
            $qry = "SELECT '" . $noreg . "' AS noreg,'Y' AS paket,kdtarifpaket as kdpaket,kdtarif,'" . $qty . "' AS qty, '" . $kdbayar . "' as kdbayar, 'BL' AS status FROM m_tarifpaketdetail
            WHERE kdtarifpaket='" . $kdpaket . "'";
            $query = $this->db->query($qry);
            $hasil = array();
            foreach ($query->result() as $dat) {
                $hasil[] = array(
                    'nobill'   => $nobill,
                    'noreg'   => $dat->noreg,
                    'paket'   => $dat->paket,
                    'kdpaket'   => $dat->kdpaket,
                    'kdtarif'   => $dat->kdtarif,
                    'harga'   => $harga,
                    'qty'   => $dat->qty,
                    'kdbayar'   => $dat->kdbayar,
                    'status'   => $dat->status,
                    'tglinput'   => $tgl,
                    'id_users'   => $id_users
                );
            }
            $this->db->where('kdpaket', $kdpaket);
            $this->db->where('paket', 'Y');
            $this->db->where('noreg', $noreg);
            $this->db->where('nobill', $nobill);
            $this->db->update_batch('t_billrajal', $hasil, 'kdtarif');
            return $hasil;
        } else {
            $hasil = $this->db->query("update t_billrajal set qty='$qty',kdbayar='$kdbayar',tglinput='$tgl',id_users='$id_users' where noreg='$noreg' and nobill='$nobill' and paket='N' and kdtarif='$kdtarif'");
            return $hasil;
        }
    }
    function hapus_barang($idbill)
    {
        $hasil = $this->db->query("DELETE FROM t_billrajal WHERE idbill='$idbill'");
        return $hasil;
    }
    /////////////////////Paket tarif//////////////////////////
    function addpaket($noreg, $paket, $kdpaket, $kdtarif, $qty)
    {
        $hasil = $this->db->query("INSERT INTO t_billrajal (noreg,paket,kdpaket,kdtarif,qty)VALUES('$noreg','$paket','$kdpaket','$kdtarif','$qty')");
        return $hasil;
    }
    function savepaket($noreg, $paket, $kdpaket, $kdtarif, $qty)
    {
        $hasil = $this->db->query("INSERT INTO t_billrajal (noreg,paket,kdpaket,kdtarif,qty)VALUES('$noreg','$paket','$kdpaket','$kdtarif','$qty')");
        return $hasil;
    }
    //////////////////////obat////////////////////////////////////
    function obat_bill_list($noreg)
    {
        $hasil = $this->db->query("SELECT a.*,b.nmobat FROM t_billobat a
            LEFT JOIN m_obat b ON a.kdobat=b.kdobat where a.noreg='$noreg'");
        return $hasil->result();
    }

    function simpan_obat($nobill, $noreg, $kdobat, $hargaobat, $qty, $kdbayar, $status, $tgl, $user)
    {
        $hasil = $this->db->query("INSERT INTO t_billobat (nobill, noreg, kdobat, hargaobat, qty, kdbayar, status, tglinput, id_users)VALUES('$nobill','$noreg','$kdobat',$hargaobat,'$qty', '$kdbayar','$status','$tgl','$user')");
        return $hasil;
    }
    function update_obat($nobill, $noreg, $kdobat, $hargaobat, $qty, $kdbayar, $status, $tgl, $user)
    {
        $hasil = $this->db->query("update t_billobat set hargaobat='$hargaobat',qty='$qty', kdbayar='$kdbayar',id_users='$user' where noreg='$noreg' and nobill='$nobill' and kdobat='$kdobat'");
        return $hasil;
    }
    function hapus_obat($idbill)
    {
        $hasil = $this->db->query("DELETE FROM t_billobat WHERE idbill='$idbill'");
        return $hasil;
    }
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
}

/* End of file T_daftar_model.php */
/* Location: ./application/models/T_daftar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-23 06:32:59 */
/* http://harviacode.com */
