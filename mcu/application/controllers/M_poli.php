<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_poli extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_poli_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_poli/m_poli_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_poli_model->json();
    }

    public function read($id)
    {
        $row = $this->M_poli_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdpoli' => $row->kdpoli,
		'poli' => $row->poli,
		'kdunit' => $row->kdunit,
	    );
            $this->template->load('template','m_poli/m_poli_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_poli/create_action'),
	    'kdpoli' => set_value('kdpoli'),
	    'poli' => set_value('poli'),
	    'kdunit' => set_value('kdunit'),
	);
        $this->template->load('template','m_poli/m_poli_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'poli' => $this->input->post('poli',TRUE),
		'kdunit' => $this->input->post('kdunit',TRUE),
	    );

            $this->M_poli_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function update($id)
    {
        $row = $this->M_poli_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_poli/update_action'),
		'kdpoli' => set_value('kdpoli', $row->kdpoli),
		'poli' => set_value('poli', $row->poli),
		'kdunit' => set_value('kdunit', $row->kdunit),
	    );
            $this->template->load('template','m_poli/m_poli_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdpoli', TRUE));
        } else {
            $data = array(
		'poli' => $this->input->post('poli',TRUE),
		'kdunit' => $this->input->post('kdunit',TRUE),
	    );

            $this->M_poli_model->update($this->input->post('kdpoli', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_poli_model->get_by_id($id);

        if ($row) {
            $this->M_poli_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_poli'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('poli', 'poli', 'trim|required');
	$this->form_validation->set_rules('kdunit', 'kdunit', 'trim|required');

	$this->form_validation->set_rules('kdpoli', 'kdpoli', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_poli.php */
/* Location: ./application/controllers/M_poli.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 19:44:26 */
/* http://harviacode.com */