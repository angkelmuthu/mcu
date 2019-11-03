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
        $this->datatables->select('idreg,noreg,nomr,baru,kddokter,kdpoli,kdbayar,rujukan,kdrujuk,tglreg,id_users');
        $this->datatables->from('t_daftar');
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
        $this->db->select('a.idreg,a.noreg,a.nomr,b.nik,b.nama,b.tgllhr,a.baru,a.kddokter,a.kdpoli,a.kdbayar,a.rujukan,a.kdrujuk,a.tglreg,a.id_users');
        $this->db->from('t_daftar a');
        $this->db->join('m_pasien b', 'a.nomr = b.nomr', 'left');
        $this->db->where('a.idreg', $id);
        return $this->db->get()->row();
    }
    ////tarif
    function get_tarif()
    {
        $this->db->select('*');
        $this->db->from('m_tarif a');
        $this->db->join('m_tarifgroup b', 'a.kdtarifgroup = b.kdtarifgroup');
        return $this->db->get()->result();
    }
    /////tarif paket
    function get_tarifpaket()
    {
        $hasil = $this->db->query("SELECT a.kdtarifpaket,a.nmpaket,c.kdtarif,c.nmtarif,sum(c.harga) as harga FROM m_tarifpaket a
        INNER JOIN m_tarifpaketdetail b ON a.kdtarifpaket=b.kdtarifpaket
        LEFT JOIN m_tarif c ON b.kdtarif=c.kdtarif GROUP BY a.kdtarifpaket");
        return $hasil->result();
    }

    //////////////////////////////////////////////
    function barang_list()
    {
        $hasil = $this->db->query("SELECT * FROM t_billrajal a LEFT JOIN m_tarif b on a.kdtarif=b.kdtarif LEFT JOIN m_tarifgroup c on b.kdtarifgroup=c.kdtarifgroup where a.paket='N'");
        return $hasil->result();
    }
    function paket_bill_list()
    {
        $hasil = $this->db->query("SELECT b.nmpaket,a.qty,b.potongan,(SELECT SUM(harga) FROM m_tarifpaketdetail x1
        LEFT JOIN m_tarifpaket x2 ON x1.kdtarifpaket=x2.kdtarifpaket
        LEFT JOIN m_tarif x3 ON x1.kdtarif=x3.kdtarif
        WHERE x2.kdtarifpaket=b.kdtarifpaket) AS harga
        FROM t_billrajal a LEFT JOIN m_tarifpaket b on a.kdpaket=b.kdtarifpaket where a.paket='Y'");
        return $hasil->result();
    }

    function simpan_barang($noreg, $paket, $kdpaket, $kdtarif, $qty)
    {
        $hasil = $this->db->query("INSERT INTO t_billrajal (noreg,paket,kdpaket,kdtarif,qty)VALUES('$noreg','$paket','$kdpaket','$kdtarif','$qty')");
        return $hasil;
    }
    function update_barang($noreg, $paket, $kdpaket, $kdtarif, $qty)
    {
        $hasil = $this->db->query("update t_billrajal set qty='$qty' where noreg='$noreg' and kdtarif='$kdtarif'");
        return $hasil;
    }
    function hapus_barang($nobill)
    {
        $hasil = $this->db->query("DELETE FROM t_billrajal WHERE nobill='$nobill'");
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
    //////////////////////////////////////////////////////////
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
