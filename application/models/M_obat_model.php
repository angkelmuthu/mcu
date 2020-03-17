<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_obat_model extends CI_Model
{

    public $table = 'm_obat';
    public $id = 'kdobat';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('kdobat,kdkatalog,kdfornas,generik,nmobat,kdobatjenis,dosis,kdobatsatuan,kdobatcara,kdobatpakai,hargaobat,hashtag,tglinput,id_users');
        $this->datatables->from('m_obat');
        //add this line for join
        //$this->datatables->join('table2', 'm_obat.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('m_obat/read/$1'),'<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed'))." 
            ".anchor(site_url('m_obat/update/$1'),'<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed'))." 
                ".anchor(site_url('m_obat/delete/$1'),'<i class="fal fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'kdobat');
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kdobat', $q);
	$this->db->or_like('kdkatalog', $q);
	$this->db->or_like('kdfornas', $q);
	$this->db->or_like('generik', $q);
	$this->db->or_like('nmobat', $q);
	$this->db->or_like('kdobatjenis', $q);
	$this->db->or_like('dosis', $q);
	$this->db->or_like('kdobatsatuan', $q);
	$this->db->or_like('kdobatcara', $q);
	$this->db->or_like('kdobatpakai', $q);
	$this->db->or_like('hargaobat', $q);
	$this->db->or_like('hashtag', $q);
	$this->db->or_like('tglinput', $q);
	$this->db->or_like('id_users', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kdobat', $q);
	$this->db->or_like('kdkatalog', $q);
	$this->db->or_like('kdfornas', $q);
	$this->db->or_like('generik', $q);
	$this->db->or_like('nmobat', $q);
	$this->db->or_like('kdobatjenis', $q);
	$this->db->or_like('dosis', $q);
	$this->db->or_like('kdobatsatuan', $q);
	$this->db->or_like('kdobatcara', $q);
	$this->db->or_like('kdobatpakai', $q);
	$this->db->or_like('hargaobat', $q);
	$this->db->or_like('hashtag', $q);
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

/* End of file M_obat_model.php */
/* Location: ./application/models/M_obat_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-18 06:49:30 */
/* http://harviacode.com */