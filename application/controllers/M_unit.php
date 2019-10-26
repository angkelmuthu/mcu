<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_unit_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_unit/m_unit_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_unit_model->json();
    }

    public function read($id)
    {
        $row = $this->M_unit_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdunit' => $row->kdunit,
		'unit' => $row->unit,
	    );
            $this->template->load('template','m_unit/m_unit_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_unit/create_action'),
	    'kdunit' => set_value('kdunit'),
	    'unit' => set_value('unit'),
	);
        $this->template->load('template','m_unit/m_unit_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'unit' => $this->input->post('unit',TRUE),
	    );

            $this->M_unit_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function update($id)
    {
        $row = $this->M_unit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_unit/update_action'),
		'kdunit' => set_value('kdunit', $row->kdunit),
		'unit' => set_value('unit', $row->unit),
	    );
            $this->template->load('template','m_unit/m_unit_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdunit', TRUE));
        } else {
            $data = array(
		'unit' => $this->input->post('unit',TRUE),
	    );

            $this->M_unit_model->update($this->input->post('kdunit', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_unit_model->get_by_id($id);

        if ($row) {
            $this->M_unit_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_unit'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('unit', 'unit', 'trim|required');

	$this->form_validation->set_rules('kdunit', 'kdunit', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_unit.php */
/* Location: ./application/controllers/M_unit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 19:44:33 */
/* http://harviacode.com */