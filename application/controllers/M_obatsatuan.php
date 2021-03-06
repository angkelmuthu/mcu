<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_obatsatuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_obatsatuan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_obatsatuan/m_obatsatuan_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_obatsatuan_model->json();
    }

    public function read($id)
    {
        $row = $this->M_obatsatuan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdobatsatuan' => $row->kdobatsatuan,
		'obatsatuan' => $row->obatsatuan,
	    );
            $this->template->load('template','m_obatsatuan/m_obatsatuan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatsatuan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_obatsatuan/create_action'),
	    'kdobatsatuan' => set_value('kdobatsatuan'),
	    'obatsatuan' => set_value('obatsatuan'),
	);
        $this->template->load('template','m_obatsatuan/m_obatsatuan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'obatsatuan' => $this->input->post('obatsatuan',TRUE),
	    );

            $this->M_obatsatuan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_obatsatuan'));
        }
    }

    public function update($id)
    {
        $row = $this->M_obatsatuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_obatsatuan/update_action'),
		'kdobatsatuan' => set_value('kdobatsatuan', $row->kdobatsatuan),
		'obatsatuan' => set_value('obatsatuan', $row->obatsatuan),
	    );
            $this->template->load('template','m_obatsatuan/m_obatsatuan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatsatuan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdobatsatuan', TRUE));
        } else {
            $data = array(
		'obatsatuan' => $this->input->post('obatsatuan',TRUE),
	    );

            $this->M_obatsatuan_model->update($this->input->post('kdobatsatuan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_obatsatuan'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_obatsatuan_model->get_by_id($id);

        if ($row) {
            $this->M_obatsatuan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_obatsatuan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatsatuan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('obatsatuan', 'obatsatuan', 'trim|required');

	$this->form_validation->set_rules('kdobatsatuan', 'kdobatsatuan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_obatsatuan.php */
/* Location: ./application/controllers/M_obatsatuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-18 02:56:14 */
/* http://harviacode.com */