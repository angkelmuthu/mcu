<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_vital_model extends CI_Model
{

    public $table = 't_vital';
    public $id = 'noreg';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('noreg,nomr,bb,tb,sb,sistole,diastole,nadi,napas,keterangan,tglinput,id_users');
        $this->datatables->from('t_vital');
        //add this line for join
        //$this->datatables->join('table2', 't_vital.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t_vital/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
            " . anchor(site_url('t_vital/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
                " . anchor(site_url('t_vital/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'noreg');
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
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function get_by_nomr($id, $nomr)
    {
        $this->db->where('nomr', $nomr);
        return $this->db->get($this->table)->result();
    }

    function get_pasien($id)
    {
        $this->db->from('v_pendaftaran');
        $this->db->where('noreg', $id);
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('noreg', $q);
        $this->db->or_like('bb', $q);
        $this->db->or_like('tb', $q);
        $this->db->or_like('sb', $q);
        $this->db->or_like('sistole', $q);
        $this->db->or_like('diastole', $q);
        $this->db->or_like('nadi', $q);
        $this->db->or_like('napas', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('tglinput', $q);
        $this->db->or_like('id_users', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('noreg', $q);
        $this->db->or_like('bb', $q);
        $this->db->or_like('tb', $q);
        $this->db->or_like('sb', $q);
        $this->db->or_like('sistole', $q);
        $this->db->or_like('diastole', $q);
        $this->db->or_like('nadi', $q);
        $this->db->or_like('napas', $q);
        $this->db->or_like('keterangan', $q);
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

/* End of file t_vital_model.php */
/* Location: ./application/models/t_vital_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-23 08:32:55 */
/* http://harviacode.com */
