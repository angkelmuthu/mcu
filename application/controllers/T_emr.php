<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_emr extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_emr_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_emr/t_emr_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_emr_model->json();
    }

    public function read($id)
    {
        $row = $this->T_emr_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idemr' => $row->idemr,
                'noreg' => $row->noreg,
                'subjek' => $row->subjek,
                'objek' => $row->objek,
                'asessment' => $row->asessment,
                'plann' => $row->plann,
                'instruksi' => $row->instruksi,
                'tglinput' => $row->tglinput,
                'id_users' => $row->id_users,
            );
            $this->template->load('template', 't_emr/t_emr_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_emr'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_emr/create_action'),
            'idemr' => set_value('idemr'),
            'noreg' => set_value('noreg'),
            'subjek' => set_value('subjek'),
            'objek' => set_value('objek'),
            'asessment' => set_value('asessment'),
            'plann' => set_value('plann'),
            'instruksi' => set_value('instruksi'),
            'tglinput' => set_value('tglinput'),
            'id_users' => set_value('id_users'),
        );
        $this->template->load('template', 't_emr/t_emr_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'noreg' => $this->input->post('noreg', TRUE),
                'subjek' => $this->input->post('subjek', TRUE),
                'objek' => $this->input->post('objek', TRUE),
                'asessment' => $this->input->post('asessment', TRUE),
                'plann' => $this->input->post('plann', TRUE),
                'instruksi' => $this->input->post('instruksi', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->T_emr_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_emr'));
        }
    }

    public function update()
    {
        $id = $this->input->post('idemr');
        $idreg = $this->input->post('idreg');
        $row = $this->T_emr_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_emr/update_action'),
                'idemr' => set_value('idemr', $row->idemr),
                'noreg' => set_value('noreg', $row->noreg),
                'subjek' => set_value('subjek', $row->subjek),
                'objek' => set_value('objek', $row->objek),
                'asessment' => set_value('asessment', $row->asessment),
                'plann' => set_value('plann', $row->plann),
                'instruksi' => set_value('instruksi', $row->instruksi),
                'tglinput' => set_value('tglinput', $row->tglinput),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 't_emr/t_emr_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_daftar/read/'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        $idreg = $this->input->post('idreg');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idemr', TRUE));
        } else {
            $data = array(
                'noreg' => $this->input->post('noreg', TRUE),
                'subjek' => $this->input->post('subjek', TRUE),
                'objek' => $this->input->post('objek', TRUE),
                'asessment' => $this->input->post('asessment', TRUE),
                'plann' => $this->input->post('plann', TRUE),
                'instruksi' => $this->input->post('instruksi', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->T_emr_model->update($this->input->post('idemr', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_daftar/read/' . $idreg));
        }
    }

    public function delete($id)
    {
        $row = $this->T_emr_model->get_by_id($id);

        if ($row) {
            $this->T_emr_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_emr'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_emr'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('noreg', 'noreg', 'trim|required');
        $this->form_validation->set_rules('subjek', 'subjek', 'trim|required');
        $this->form_validation->set_rules('objek', 'objek', 'trim|required');
        $this->form_validation->set_rules('asessment', 'asessment', 'trim|required');
        $this->form_validation->set_rules('plann', 'plann', 'trim|required');
        $this->form_validation->set_rules('instruksi', 'instruksi', 'trim|required');
        $this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('idemr', 'idemr', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file T_emr.php */
/* Location: ./application/controllers/T_emr.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 18:43:40 */
/* http://harviacode.com */
