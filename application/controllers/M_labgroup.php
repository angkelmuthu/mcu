<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_labgroup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_labgroup_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_labgroup/m_labgroup_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_labgroup_model->json();
    }

    public function read($id)
    {
        $row = $this->M_labgroup_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdlabgroup' => $row->kdlabgroup,
		'kdtarif' => $row->kdtarif,
		'kdlab' => $row->kdlab,
		'tglinput' => $row->tglinput,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','m_labgroup/m_labgroup_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_labgroup'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_labgroup/create_action'),
	    'kdlabgroup' => set_value('kdlabgroup'),
	    'kdtarif' => set_value('kdtarif'),
	    'kdlab' => set_value('kdlab'),
	    'tglinput' => set_value('tglinput'),
	    'id_users' => set_value('id_users'),
	);
        $this->template->load('template','m_labgroup/m_labgroup_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kdtarif' => $this->input->post('kdtarif',TRUE),
		'kdlab' => $this->input->post('kdlab',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_labgroup_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_labgroup'));
        }
    }

    public function update($id)
    {
        $row = $this->M_labgroup_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_labgroup/update_action'),
		'kdlabgroup' => set_value('kdlabgroup', $row->kdlabgroup),
		'kdtarif' => set_value('kdtarif', $row->kdtarif),
		'kdlab' => set_value('kdlab', $row->kdlab),
		'tglinput' => set_value('tglinput', $row->tglinput),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            $this->template->load('template','m_labgroup/m_labgroup_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_labgroup'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdlabgroup', TRUE));
        } else {
            $data = array(
		'kdtarif' => $this->input->post('kdtarif',TRUE),
		'kdlab' => $this->input->post('kdlab',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_labgroup_model->update($this->input->post('kdlabgroup', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_labgroup'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_labgroup_model->get_by_id($id);

        if ($row) {
            $this->M_labgroup_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_labgroup'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_labgroup'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kdtarif', 'kdtarif', 'trim|required');
	$this->form_validation->set_rules('kdlab', 'kdlab', 'trim|required');
	$this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('kdlabgroup', 'kdlabgroup', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_labgroup.php */
/* Location: ./application/controllers/M_labgroup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-03 15:09:18 */
/* http://harviacode.com */