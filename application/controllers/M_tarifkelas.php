<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_tarifkelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_tarifkelas_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_tarifkelas/m_tarifkelas_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_tarifkelas_model->json();
    }

    public function read($id)
    {
        $row = $this->M_tarifkelas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kdkelas' => $row->kdkelas,
		'kdtarif' => $row->kdtarif,
		'harga' => $row->harga,
		'tglinput' => $row->tglinput,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','m_tarifkelas/m_tarifkelas_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifkelas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_tarifkelas/create_action'),
	    'id' => set_value('id'),
	    'kdkelas' => set_value('kdkelas'),
	    'kdtarif' => set_value('kdtarif'),
	    'harga' => set_value('harga'),
	    'tglinput' => set_value('tglinput'),
	    'id_users' => set_value('id_users'),
	);
        $this->template->load('template','m_tarifkelas/m_tarifkelas_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kdkelas' => $this->input->post('kdkelas',TRUE),
		'kdtarif' => $this->input->post('kdtarif',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_tarifkelas_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_tarifkelas'));
        }
    }

    public function update($id)
    {
        $row = $this->M_tarifkelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_tarifkelas/update_action'),
		'id' => set_value('id', $row->id),
		'kdkelas' => set_value('kdkelas', $row->kdkelas),
		'kdtarif' => set_value('kdtarif', $row->kdtarif),
		'harga' => set_value('harga', $row->harga),
		'tglinput' => set_value('tglinput', $row->tglinput),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            $this->template->load('template','m_tarifkelas/m_tarifkelas_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifkelas'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kdkelas' => $this->input->post('kdkelas',TRUE),
		'kdtarif' => $this->input->post('kdtarif',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_tarifkelas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_tarifkelas'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_tarifkelas_model->get_by_id($id);

        if ($row) {
            $this->M_tarifkelas_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_tarifkelas'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifkelas'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kdkelas', 'kdkelas', 'trim|required');
	$this->form_validation->set_rules('kdtarif', 'kdtarif', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_tarifkelas.php */
/* Location: ./application/controllers/M_tarifkelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-14 16:01:03 */
/* http://harviacode.com */