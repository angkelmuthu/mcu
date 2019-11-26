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
        $bill_total = $this->billing_model->billing_total($noreg);
        $bill_paket_total = $this->billing_model->billing_paket_total($noreg);
        $bill_obat_total = $this->billing_model->billing_obat_total($noreg);
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
                'bill_total' => $bill_total->total,
                'bill_paket_total' => $bill_paket_total->total,
                'bill_obat_total' => $bill_obat_total->total,
                'billing' => $this->billing_model->billing($noreg),
                'billing_paket' => $this->billing_model->billing_paket($noreg),
                'billing_obat' => $this->billing_model->billing_obat($noreg),

            );
            $this->template->load('template', 'billing/billing_read', $data);

            //$this->template->load('template', 'billing/billing_read',);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('billing'));
        }
    }
}

/* End of file billing.php */
/* Location: ./application/controllers/billing.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-22 04:06:22 */
/* http://harviacode.com */
