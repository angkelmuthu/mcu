<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_obatcara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_obatcara_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_obatcara/m_obatcara_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_obatcara_model->json();
    }

    public function read($id)
    {
        $row = $this->M_obatcara_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdobatcara' => $row->kdobatcara,
		'obatcara' => $row->obatcara,
	    );
            $this->template->load('template','m_obatcara/m_obatcara_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatcara'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_obatcara/create_action'),
	    'kdobatcara' => set_value('kdobatcara'),
	    'obatcara' => set_value('obatcara'),
	);
        $this->template->load('template','m_obatcara/m_obatcara_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'obatcara' => $this->input->post('obatcara',TRUE),
	    );

            $this->M_obatcara_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_obatcara'));
        }
    }

    public function update($id)
    {
        $row = $this->M_obatcara_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_obatcara/update_action'),
		'kdobatcara' => set_value('kdobatcara', $row->kdobatcara),
		'obatcara' => set_value('obatcara', $row->obatcara),
	    );
            $this->template->load('template','m_obatcara/m_obatcara_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatcara'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdobatcara', TRUE));
        } else {
            $data = array(
		'obatcara' => $this->input->post('obatcara',TRUE),
	    );

            $this->M_obatcara_model->update($this->input->post('kdobatcara', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_obatcara'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_obatcara_model->get_by_id($id);

        if ($row) {
            $this->M_obatcara_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_obatcara'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatcara'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('obatcara', 'obatcara', 'trim|required');

	$this->form_validation->set_rules('kdobatcara', 'kdobatcara', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_obatcara.php */
/* Location: ./application/controllers/M_obatcara.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-18 02:53:02 */
/* http://harviacode.com */