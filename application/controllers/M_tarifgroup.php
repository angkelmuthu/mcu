<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_tarifgroup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_tarifgroup_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_tarifgroup/m_tarifgroup_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_tarifgroup_model->json();
    }

    public function read($id)
    {
        $row = $this->M_tarifgroup_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdtarifgroup' => $row->kdtarifgroup,
		'tarifgroup' => $row->tarifgroup,
	    );
            $this->template->load('template','m_tarifgroup/m_tarifgroup_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifgroup'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_tarifgroup/create_action'),
	    'kdtarifgroup' => set_value('kdtarifgroup'),
	    'tarifgroup' => set_value('tarifgroup'),
	);
        $this->template->load('template','m_tarifgroup/m_tarifgroup_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tarifgroup' => $this->input->post('tarifgroup',TRUE),
	    );

            $this->M_tarifgroup_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_tarifgroup'));
        }
    }

    public function update($id)
    {
        $row = $this->M_tarifgroup_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_tarifgroup/update_action'),
		'kdtarifgroup' => set_value('kdtarifgroup', $row->kdtarifgroup),
		'tarifgroup' => set_value('tarifgroup', $row->tarifgroup),
	    );
            $this->template->load('template','m_tarifgroup/m_tarifgroup_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifgroup'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdtarifgroup', TRUE));
        } else {
            $data = array(
		'tarifgroup' => $this->input->post('tarifgroup',TRUE),
	    );

            $this->M_tarifgroup_model->update($this->input->post('kdtarifgroup', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_tarifgroup'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_tarifgroup_model->get_by_id($id);

        if ($row) {
            $this->M_tarifgroup_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_tarifgroup'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifgroup'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('tarifgroup', 'tarifgroup', 'trim|required');

	$this->form_validation->set_rules('kdtarifgroup', 'kdtarifgroup', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_tarifgroup.php */
/* Location: ./application/controllers/M_tarifgroup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 19:37:20 */
/* http://harviacode.com */