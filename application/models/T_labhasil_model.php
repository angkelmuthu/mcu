<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_labhasil_model extends CI_Model
{

    public $table = 't_labhasil';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('nobill,noreg,kdtarif,nilai,tglinput,id_users');
        $this->datatables->from('t_labhasil');
        //add this line for join
        //$this->datatables->join('table2', 't_labhasil.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t_labhasil/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
            " . anchor(site_url('t_labhasil/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
                " . anchor(site_url('t_labhasil/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), '');
        return $this->datatables->generate();
    }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_tindakan_lab($noreg)
    {
        $qry = "SELECT d.*,e.full_name FROM t_billrajal a
        LEFT JOIN m_tarif b ON a.kdtarif=b.kdtarif
        LEFT JOIN m_labgroup c ON b.kdtarif=c.kdtarif
        LEFT JOIN m_lab d ON c.kdlab=d.kdlab
        LEFT JOIN tbl_user e ON e.id_users=d.id_users
        WHERE b.kdpoli='5' and a.noreg='$noreg'";
        $hasil = $this->db->query($qry);
        return $hasil->result();
        //return $this->db->get()->row();
    }

    // get data by id
    function get_by_id($noreg)
    {
        $this->db->select('*');
        $this->db->from('t_daftar');
        $this->datatables->join('m_pasien', 't_daftar.nomr = m_pasien.nomr');
        $this->db->where('noreg', $noreg);
        //return $this->db->get($this->table)->row();
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('', $q);
        $this->db->or_like('nobill', $q);
        $this->db->or_like('noreg', $q);
        $this->db->or_like('kdtarif', $q);
        $this->db->or_like('nilai', $q);
        $this->db->or_like('tglinput', $q);
        $this->db->or_like('id_users', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
        $this->db->or_like('nobill', $q);
        $this->db->or_like('noreg', $q);
        $this->db->or_like('kdtarif', $q);
        $this->db->or_like('nilai', $q);
        $this->db->or_like('tglinput', $q);
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

/* End of file T_labhasil_model.php */
/* Location: ./application/models/T_labhasil_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-19 07:44:03 */
/* http://harviacode.com */
