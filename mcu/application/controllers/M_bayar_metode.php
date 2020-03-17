<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_bayar_metode extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_bayar_metode_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_bayar_metode/m_bayar_metode_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_bayar_metode_model->json();
    }

    public function read($id)
    {
        $row = $this->M_bayar_metode_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdmetodebayar' => $row->kdmetodebayar,
		'metode' => $row->metode,
		'keterangan' => $row->keterangan,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_bayar_metode/m_bayar_metode_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_bayar_metode'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_bayar_metode/create_action'),
	    'kdmetodebayar' => set_value('kdmetodebayar'),
	    'metode' => set_value('metode'),
	    'keterangan' => set_value('keterangan'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_bayar_metode/m_bayar_metode_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'metode' => $this->input->post('metode',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_bayar_metode_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_bayar_metode'));
        }
    }

    public function update($id)
    {
        $row = $this->M_bayar_metode_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_bayar_metode/update_action'),
		'kdmetodebayar' => set_value('kdmetodebayar', $row->kdmetodebayar),
		'metode' => set_value('metode', $row->metode),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_bayar_metode/m_bayar_metode_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_bayar_metode'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdmetodebayar', TRUE));
        } else {
            $data = array(
		'metode' => $this->input->post('metode',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_bayar_metode_model->update($this->input->post('kdmetodebayar', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_bayar_metode'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_bayar_metode_model->get_by_id($id);

        if ($row) {
            $this->M_bayar_metode_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_bayar_metode'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_bayar_metode'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('metode', 'metode', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('kdmetodebayar', 'kdmetodebayar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_bayar_metode.php */
/* Location: ./application/controllers/M_bayar_metode.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-22 04:05:41 */
/* http://harviacode.com */