<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Billing_model extends CI_Model
{

    public $table = 'm_bayar';
    public $id = 'kdbayar';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function json()
    {
        $this->db->select('idreg,noreg,baru,dokter,bayar,rujukan,kdrujuk,tglreg,full_name as petugas,nomr,nik,nama,tgllhr,alamat,kodepos,kdklmn,kdkawin,hp,tglinput,kelamin,kawin,poli,unit');
        $this->db->from('v_pendaftaran');
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($noreg)
    {
        $this->db->from('v_pendaftaran');
        $this->db->where('noreg', $noreg);
        return $this->db->get()->row();
    }
    //////////////////////////////////////////////
    function billing($noreg)
    {
        $hasil = $this->db->query("SELECT *,a.harga as hargas,d.* FROM t_billrajal a LEFT JOIN m_tarif b on a.kdtarif=b.kdtarif LEFT JOIN m_poli c on b.kdpoli=c.kdpoli LEFT JOIN m_bayar d ON a.kdbayar=d.kdbayar where a.noreg='$noreg' and a.paket='N'");
        return $hasil->result();
    }
    function billing_total($noreg)
    {
        $hasil = $this->db->query("SELECT SUM(a.harga*qty) as total FROM t_billrajal a LEFT JOIN m_tarif b on a.kdtarif=b.kdtarif LEFT JOIN m_poli c on b.kdpoli=c.kdpoli LEFT JOIN m_bayar d ON a.kdbayar=d.kdbayar where a.noreg='$noreg' and a.paket='N' and d.kdmetodebayar='2'");
        return $hasil->row();
    }
    function billing_paket($noreg)
    {
        $hasil = $this->db->query("SELECT * FROM t_billrajal a LEFT JOIN m_tarif b ON a.kdtarif=b.kdtarif
            LEFT JOIN m_tarifpaket c ON c.kdtarifpaket=a.kdpaket LEFT JOIN m_bayar d ON a.kdbayar=d.kdbayar WHERE a.paket='Y' and a.noreg='$noreg'");
        return $hasil->result();
    }
    function billing_paket_total($noreg)
    {
        $hasil = $this->db->query("SELECT SUM(b.harga*qty) as total FROM t_billrajal a LEFT JOIN m_tarif b ON a.kdtarif=b.kdtarif
            LEFT JOIN m_tarifpaket c ON c.kdtarifpaket=a.kdpaket LEFT JOIN m_bayar d ON a.kdbayar=d.kdbayar WHERE a.paket='Y' and a.noreg='$noreg' and d.kdmetodebayar='2'");
        return $hasil->row();
    }
    //////////////////////obat////////////////////////////////////
    function billing_obat($noreg)
    {
        $hasil = $this->db->query("SELECT a.*,b.nmobat,d.*FROM t_billobat a
                LEFT JOIN m_obat b ON a.kdobat=b.kdobat LEFT JOIN m_bayar d ON a.kdbayar=d.kdbayar where a.noreg='$noreg'");
        return $hasil->result();
    }
    function billing_obat_total($noreg)
    {
        $hasil = $this->db->query("SELECT SUM(a.hargaobat*qty) as total FROM t_billobat a
                LEFT JOIN m_obat b ON a.kdobat=b.kdobat LEFT JOIN m_bayar d ON a.kdbayar=d.kdbayar where a.noreg='$noreg' and d.kdmetodebayar='2'");
        return $hasil->row();
    }
}

/* End of file M_bayar_model.php */
/* Location: ./application/models/M_bayar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-22 04:06:22 */
/* http://harviacode.com */
