<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dokterjadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_dokterjadwal_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_dokterjadwal/m_dokterjadwal_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_dokterjadwal_model->json();
    }

    public function read($id)
    {
        $row = $this->M_dokterjadwal_model->get_by_id($id);
        if ($row) {
            $data = array(
                'kdjadwal' => $row->kdjadwal,
                'kddokter' => $row->kddokter,
                'kdpoli' => $row->kdpoli,
                'hari' => $row->hari,
                'jam_mulai' => $row->jam_mulai,
                'jam_akhir' => $row->jam_akhir,
                'tglinput' => $row->tglinput,
                'id_users' => $row->id_users,
            );
            $this->template->load('template', 'm_dokterjadwal/m_dokterjadwal_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dokterjadwal'));
        }
    }

    public function create($nip)
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_dokterjadwal/create_action'),
            'kdjadwal' => set_value('kdjadwal'),
            'kddokter' => set_value('kddokter'),
            'kdpoli' => set_value('kdpoli'),
            'hari' => set_value('hari'),
            'jam_mulai' => set_value('jam_mulai'),
            'jam_akhir' => set_value('jam_akhir'),
            'tglinput' => set_value('tglinput'),
            'id_users' => set_value('id_users'),
            'dokter' => $this->M_dokterjadwal_model->get_dokter($nip),
        );
        $this->template->load('template', 'm_dokterjadwal/m_dokterjadwal_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kddokter' => $this->input->post('kddokter', TRUE),
                'kdpoli' => $this->input->post('kdpoli', TRUE),
                'hari' => $this->input->post('hari', TRUE),
                'jam_mulai' => $this->input->post('jam_mulai', TRUE),
                'jam_akhir' => $this->input->post('jam_akhir', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->M_dokterjadwal_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_dokterjadwal'));
        }
    }

    public function update($id)
    {
        $row = $this->M_dokterjadwal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_dokterjadwal/update_action'),
                'kdjadwal' => set_value('kdjadwal', $row->kdjadwal),
                'kddokter' => set_value('kddokter', $row->kddokter),
                'kdpoli' => set_value('kdpoli', $row->kdpoli),
                'hari' => set_value('hari', $row->hari),
                'jam_mulai' => set_value('jam_mulai', $row->jam_mulai),
                'jam_akhir' => set_value('jam_akhir', $row->jam_akhir),
                'tglinput' => set_value('tglinput', $row->tglinput),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 'm_dokterjadwal/m_dokterjadwal_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dokterjadwal'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdjadwal', TRUE));
        } else {
            $data = array(
                'kddokter' => $this->input->post('kddokter', TRUE),
                'kdpoli' => $this->input->post('kdpoli', TRUE),
                'hari' => $this->input->post('hari', TRUE),
                'jam_mulai' => $this->input->post('jam_mulai', TRUE),
                'jam_akhir' => $this->input->post('jam_akhir', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->M_dokterjadwal_model->update($this->input->post('kdjadwal', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_dokterjadwal'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_dokterjadwal_model->get_by_id($id);

        if ($row) {
            $this->M_dokterjadwal_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_dokterjadwal'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dokterjadwal'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kddokter', 'kddokter', 'trim|required');
        $this->form_validation->set_rules('kdpoli', 'kdpoli', 'trim|required');
        $this->form_validation->set_rules('hari', 'hari', 'trim|required');
        $this->form_validation->set_rules('jam_mulai', 'jam mulai', 'trim|required');
        $this->form_validation->set_rules('jam_akhir', 'jam akhir', 'trim|required');
        $this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('kdjadwal', 'kdjadwal', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_dokterjadwal.php */
/* Location: ./application/controllers/M_dokterjadwal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-21 15:55:59 */
/* http://harviacode.com */
