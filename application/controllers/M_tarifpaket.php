<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_tarifpaket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_tarifpaket_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_tarifpaket/m_tarifpaket_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_tarifpaket_model->json();
    }

    public function read($id)
    {
        $row = $this->M_tarifpaket_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdtarifpaket' => $row->kdtarifpaket,
		'kdtarif' => $row->kdtarif,
		'kdsubtarif' => $row->kdsubtarif,
		'tglinput' => $row->tglinput,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','m_tarifpaket/m_tarifpaket_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_tarifpaket/create_action'),
	    'kdtarifpaket' => set_value('kdtarifpaket'),
	    'kdtarif' => set_value('kdtarif'),
	    'kdsubtarif' => set_value('kdsubtarif'),
	    'tglinput' => set_value('tglinput'),
	    'id_users' => set_value('id_users'),
	);
        $this->template->load('template','m_tarifpaket/m_tarifpaket_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kdtarif' => $this->input->post('kdtarif',TRUE),
		'kdsubtarif' => $this->input->post('kdsubtarif',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_tarifpaket_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function update($id)
    {
        $row = $this->M_tarifpaket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_tarifpaket/update_action'),
		'kdtarifpaket' => set_value('kdtarifpaket', $row->kdtarifpaket),
		'kdtarif' => set_value('kdtarif', $row->kdtarif),
		'kdsubtarif' => set_value('kdsubtarif', $row->kdsubtarif),
		'tglinput' => set_value('tglinput', $row->tglinput),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            $this->template->load('template','m_tarifpaket/m_tarifpaket_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdtarifpaket', TRUE));
        } else {
            $data = array(
		'kdtarif' => $this->input->post('kdtarif',TRUE),
		'kdsubtarif' => $this->input->post('kdsubtarif',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_tarifpaket_model->update($this->input->post('kdtarifpaket', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_tarifpaket_model->get_by_id($id);

        if ($row) {
            $this->M_tarifpaket_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_tarifpaket'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kdtarif', 'kdtarif', 'trim|required');
	$this->form_validation->set_rules('kdsubtarif', 'kdsubtarif', 'trim|required');
	$this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('kdtarifpaket', 'kdtarifpaket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_tarifpaket.php */
/* Location: ./application/controllers/M_tarifpaket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-15 05:27:09 */
/* http://harviacode.com */