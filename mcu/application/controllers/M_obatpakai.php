<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_obatpakai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_obatpakai_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_obatpakai/m_obatpakai_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_obatpakai_model->json();
    }

    public function read($id)
    {
        $row = $this->M_obatpakai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdobatpakai' => $row->kdobatpakai,
		'obatpakai' => $row->obatpakai,
		'waktu' => $row->waktu,
		'makan' => $row->makan,
	    );
            $this->template->load('template','m_obatpakai/m_obatpakai_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatpakai'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_obatpakai/create_action'),
	    'kdobatpakai' => set_value('kdobatpakai'),
	    'obatpakai' => set_value('obatpakai'),
	    'waktu' => set_value('waktu'),
	    'makan' => set_value('makan'),
	);
        $this->template->load('template','m_obatpakai/m_obatpakai_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'obatpakai' => $this->input->post('obatpakai',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'makan' => $this->input->post('makan',TRUE),
	    );

            $this->M_obatpakai_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_obatpakai'));
        }
    }

    public function update($id)
    {
        $row = $this->M_obatpakai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_obatpakai/update_action'),
		'kdobatpakai' => set_value('kdobatpakai', $row->kdobatpakai),
		'obatpakai' => set_value('obatpakai', $row->obatpakai),
		'waktu' => set_value('waktu', $row->waktu),
		'makan' => set_value('makan', $row->makan),
	    );
            $this->template->load('template','m_obatpakai/m_obatpakai_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatpakai'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdobatpakai', TRUE));
        } else {
            $data = array(
		'obatpakai' => $this->input->post('obatpakai',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'makan' => $this->input->post('makan',TRUE),
	    );

            $this->M_obatpakai_model->update($this->input->post('kdobatpakai', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_obatpakai'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_obatpakai_model->get_by_id($id);

        if ($row) {
            $this->M_obatpakai_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_obatpakai'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatpakai'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('obatpakai', 'obatpakai', 'trim|required');
	$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
	$this->form_validation->set_rules('makan', 'makan', 'trim|required');

	$this->form_validation->set_rules('kdobatpakai', 'kdobatpakai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_obatpakai.php */
/* Location: ./application/controllers/M_obatpakai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-18 03:03:56 */
/* http://harviacode.com */