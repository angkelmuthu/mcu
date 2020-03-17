<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_obatjenis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_obatjenis_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_obatjenis/m_obatjenis_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_obatjenis_model->json();
    }

    public function read($id)
    {
        $row = $this->M_obatjenis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdobatjenis' => $row->kdobatjenis,
		'obatjenis' => $row->obatjenis,
	    );
            $this->template->load('template','m_obatjenis/m_obatjenis_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatjenis'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_obatjenis/create_action'),
	    'kdobatjenis' => set_value('kdobatjenis'),
	    'obatjenis' => set_value('obatjenis'),
	);
        $this->template->load('template','m_obatjenis/m_obatjenis_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'obatjenis' => $this->input->post('obatjenis',TRUE),
	    );

            $this->M_obatjenis_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_obatjenis'));
        }
    }

    public function update($id)
    {
        $row = $this->M_obatjenis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_obatjenis/update_action'),
		'kdobatjenis' => set_value('kdobatjenis', $row->kdobatjenis),
		'obatjenis' => set_value('obatjenis', $row->obatjenis),
	    );
            $this->template->load('template','m_obatjenis/m_obatjenis_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatjenis'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdobatjenis', TRUE));
        } else {
            $data = array(
		'obatjenis' => $this->input->post('obatjenis',TRUE),
	    );

            $this->M_obatjenis_model->update($this->input->post('kdobatjenis', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_obatjenis'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_obatjenis_model->get_by_id($id);

        if ($row) {
            $this->M_obatjenis_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_obatjenis'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatjenis'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('obatjenis', 'obatjenis', 'trim|required');

	$this->form_validation->set_rules('kdobatjenis', 'kdobatjenis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_obatjenis.php */
/* Location: ./application/controllers/M_obatjenis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-18 02:47:14 */
/* http://harviacode.com */