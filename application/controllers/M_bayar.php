<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_bayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_bayar_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_bayar/m_bayar_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_bayar_model->json();
    }

    public function read($id)
    {
        $row = $this->M_bayar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdbayar' => $row->kdbayar,
		'bayar' => $row->bayar,
		'kdmetodebayar' => $row->kdmetodebayar,
		'piutang' => $row->piutang,
		'aktif' => $row->aktif,
		'tglinput' => $row->tglinput,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','m_bayar/m_bayar_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_bayar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_bayar/create_action'),
	    'kdbayar' => set_value('kdbayar'),
	    'bayar' => set_value('bayar'),
	    'kdmetodebayar' => set_value('kdmetodebayar'),
	    'piutang' => set_value('piutang'),
	    'aktif' => set_value('aktif'),
	    'tglinput' => set_value('tglinput'),
	    'id_users' => set_value('id_users'),
	);
        $this->template->load('template','m_bayar/m_bayar_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'bayar' => $this->input->post('bayar',TRUE),
		'kdmetodebayar' => $this->input->post('kdmetodebayar',TRUE),
		'piutang' => $this->input->post('piutang',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_bayar_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_bayar'));
        }
    }

    public function update($id)
    {
        $row = $this->M_bayar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_bayar/update_action'),
		'kdbayar' => set_value('kdbayar', $row->kdbayar),
		'bayar' => set_value('bayar', $row->bayar),
		'kdmetodebayar' => set_value('kdmetodebayar', $row->kdmetodebayar),
		'piutang' => set_value('piutang', $row->piutang),
		'aktif' => set_value('aktif', $row->aktif),
		'tglinput' => set_value('tglinput', $row->tglinput),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            $this->template->load('template','m_bayar/m_bayar_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_bayar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdbayar', TRUE));
        } else {
            $data = array(
		'bayar' => $this->input->post('bayar',TRUE),
		'kdmetodebayar' => $this->input->post('kdmetodebayar',TRUE),
		'piutang' => $this->input->post('piutang',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_bayar_model->update($this->input->post('kdbayar', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_bayar'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_bayar_model->get_by_id($id);

        if ($row) {
            $this->M_bayar_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_bayar'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_bayar'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('bayar', 'bayar', 'trim|required');
	$this->form_validation->set_rules('kdmetodebayar', 'kdmetodebayar', 'trim|required');
	$this->form_validation->set_rules('piutang', 'piutang', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');
	$this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('kdbayar', 'kdbayar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_bayar.php */
/* Location: ./application/controllers/M_bayar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-23 15:47:57 */
/* http://harviacode.com */