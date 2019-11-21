<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dokter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_dokter_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_dokter/m_dokter_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_dokter_model->json();
    }

    public function read($id)
    {
        $row = $this->M_dokter_model->get_by_id($id);
        if ($row) {
            $data = array(
                'kddokter' => $row->kddokter,
                'NIP' => $row->NIP,
                'dokter' => $row->dokter,
                'aktif' => $row->aktif,
            );
            $this->template->load('template', 'm_dokter/m_dokter_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dokter'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_dokter/create_action'),
            'kddokter' => set_value('kddokter'),
            'NIP' => set_value('NIP'),
            'dokter' => set_value('dokter'),
            'aktif' => set_value('aktif'),
        );
        $this->template->load('template', 'm_dokter/m_dokter_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'NIP' => $this->input->post('NIP', TRUE),
                'dokter' => $this->input->post('dokter', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );
            $nip = $this->input->post('NIP');
            $this->M_dokter_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_dokterjadwal/create/' . $nip));
        }
    }

    public function update($id)
    {
        $row = $this->M_dokter_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_dokter/update_action'),
                'kddokter' => set_value('kddokter', $row->kddokter),
                'NIP' => set_value('NIP', $row->NIP),
                'dokter' => set_value('dokter', $row->dokter),
                'aktif' => set_value('aktif', $row->aktif),
            );
            $this->template->load('template', 'm_dokter/m_dokter_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dokter'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kddokter', TRUE));
        } else {
            $data = array(
                'NIP' => $this->input->post('NIP', TRUE),
                'dokter' => $this->input->post('dokter', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_dokter_model->update($this->input->post('kddokter', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_dokter'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_dokter_model->get_by_id($id);

        if ($row) {
            $this->M_dokter_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_dokter'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dokter'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('NIP', 'nip', 'trim|required');
        $this->form_validation->set_rules('dokter', 'dokter', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

        $this->form_validation->set_rules('kddokter', 'kddokter', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_dokter.php */
/* Location: ./application/controllers/M_dokter.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-21 15:43:09 */
/* http://harviacode.com */
