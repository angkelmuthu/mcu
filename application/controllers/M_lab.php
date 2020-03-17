<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_lab extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_lab_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_lab/m_lab_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_lab_model->json();
    }

    public function read($id)
    {
        $row = $this->M_lab_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdlab' => $row->kdlab,
		'nmlab' => $row->nmlab,
		'deskripsi' => $row->deskripsi,
		'nilai_min' => $row->nilai_min,
		'nilai_max' => $row->nilai_max,
		'tglinput' => $row->tglinput,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','m_lab/m_lab_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_lab'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_lab/create_action'),
	    'kdlab' => set_value('kdlab'),
	    'nmlab' => set_value('nmlab'),
	    'deskripsi' => set_value('deskripsi'),
	    'nilai_min' => set_value('nilai_min'),
	    'nilai_max' => set_value('nilai_max'),
	    'tglinput' => set_value('tglinput'),
	    'id_users' => set_value('id_users'),
	);
        $this->template->load('template','m_lab/m_lab_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nmlab' => $this->input->post('nmlab',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'nilai_min' => $this->input->post('nilai_min',TRUE),
		'nilai_max' => $this->input->post('nilai_max',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_lab_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_lab'));
        }
    }

    public function update($id)
    {
        $row = $this->M_lab_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_lab/update_action'),
		'kdlab' => set_value('kdlab', $row->kdlab),
		'nmlab' => set_value('nmlab', $row->nmlab),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'nilai_min' => set_value('nilai_min', $row->nilai_min),
		'nilai_max' => set_value('nilai_max', $row->nilai_max),
		'tglinput' => set_value('tglinput', $row->tglinput),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            $this->template->load('template','m_lab/m_lab_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_lab'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdlab', TRUE));
        } else {
            $data = array(
		'nmlab' => $this->input->post('nmlab',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'nilai_min' => $this->input->post('nilai_min',TRUE),
		'nilai_max' => $this->input->post('nilai_max',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_lab_model->update($this->input->post('kdlab', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_lab'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_lab_model->get_by_id($id);

        if ($row) {
            $this->M_lab_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_lab'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_lab'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nmlab', 'nmlab', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('nilai_min', 'nilai min', 'trim|required');
	$this->form_validation->set_rules('nilai_max', 'nilai max', 'trim|required');
	$this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('kdlab', 'kdlab', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_lab.php */
/* Location: ./application/controllers/M_lab.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-03 15:01:26 */
/* http://harviacode.com */