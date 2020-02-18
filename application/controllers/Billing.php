<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Billing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('billing_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {

        $data = array(
            'billing' => $this->billing_model->json(),
        );
        $this->template->load('template', 'billing/billing_list', $data);
    }

    public function read($noreg)
    {
        $row = $this->billing_model->get_by_id($noreg);
        if ($row) {
            $data = array(
                'idreg' => $row->idreg,
                'noreg' => $row->noreg,
                'nomr' => $row->nomr,
                'nama' => $row->nama,
                'nik' => $row->nik,
                'kelamin' => $row->kelamin,
                'kawin' => $row->kawin,
                'tgllhr' => $row->tgllhr,
                'baru' => $row->baru,
                'dokter' => $row->dokter,
                'poli' => $row->poli,
                'bayar' => $row->bayar,
                'kdbayar' => $row->kdbayar,
                'rujukan' => $row->rujukan,
                'kdrujuk' => $row->kdrujuk,
                'tglreg' => $row->tglreg,
                'petugas' => $row->id_users,
                'billing_bayar' => $this->billing_model->billing_bayar($noreg),
                'billing_total' => $this->billing_model->billing_total($noreg),
                'billing' => $this->billing_model->billing($noreg),
                'billing_obat' => $this->billing_model->billing_obat($noreg),
                'get_carabayar' => $this->billing_model->get_carabayar(),

            );
            $this->template->load('template', 'billing/billing_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('billing'));
        }
    }
    public function updatecrbayar()
    {
        $noreg = $this->input->post('noreg');
        $resep = $this->input->post('resep');
        $kode = $this->input->post('kode');
        $kdbayar = $this->input->post('kdbayar');
        $nobill = $this->input->post('nobill');
        $data = $this->billing_model->updatecarabayar($nobill, $noreg, $kdbayar, $kode, $resep);
        redirect(site_url('billing/read/' . $noreg));
    }
    public function bayar()
    {
        $noreg = $this->input->post('noreg');
        $nobill = $this->input->post('nobill');
        $jmlbayar = $this->input->post('jmlbayar');
        $tglinput = $this->input->post('tglinput');
        $id_users = $this->input->post('id_users');
        $data = $this->billing_model->ins_billbayar($nobill, $noreg, $jmlbayar, $tglinput, $id_users);
        redirect(site_url('billing/read/' . $noreg));
    }
}

/* End of file billing.php */
/* Location: ./application/controllers/billing.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-22 04:06:22 */
/* http://harviacode.com */
