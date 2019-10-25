<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_asessment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_asessment_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_asessment/t_asessment_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_asessment_model->json();
    }

    public function read($id)
    {
        $row = $this->T_asessment_model->get_by_id($id);
        if ($row) {
            $data = array(
                'noreg' => $row->noreg,
                'bb' => $row->bb,
                'tb' => $row->tb,
                'sb' => $row->sb,
                'sistole' => $row->sistole,
                'diastole' => $row->diastole,
                'nadi' => $row->nadi,
                'napas' => $row->napas,
                'keterangan' => $row->keterangan,
                'tglinput' => $row->tglinput,
                'id_users' => $row->id_users,
            );
            $this->template->load('template', 't_asessment/t_asessment_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_asessment'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_asessment/create_action'),
            'noreg' => set_value('noreg'),
            'bb' => set_value('bb'),
            'tb' => set_value('tb'),
            'sb' => set_value('sb'),
            'sistole' => set_value('sistole'),
            'diastole' => set_value('diastole'),
            'nadi' => set_value('nadi'),
            'napas' => set_value('napas'),
            'keterangan' => set_value('keterangan'),
            'tglinput' => set_value('tglinput'),
            'id_users' => set_value('id_users'),
        );
        $this->template->load('template', 't_asessment/t_asessment_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'noreg' => $this->input->post('noreg', TRUE),
                'bb' => $this->input->post('bb', TRUE),
                'tb' => $this->input->post('tb', TRUE),
                'sb' => $this->input->post('sb', TRUE),
                'sistole' => $this->input->post('sistole', TRUE),
                'diastole' => $this->input->post('diastole', TRUE),
                'nadi' => $this->input->post('nadi', TRUE),
                'napas' => $this->input->post('napas', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->T_asessment_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_asessment'));
        }
    }

    public function update($id)
    {
        $row = $this->T_asessment_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_asessment/update_action'),
                'noreg' => set_value('noreg', $row->noreg),
                'bb' => set_value('bb', $row->bb),
                'tb' => set_value('tb', $row->tb),
                'sb' => set_value('sb', $row->sb),
                'sistole' => set_value('sistole', $row->sistole),
                'diastole' => set_value('diastole', $row->diastole),
                'nadi' => set_value('nadi', $row->nadi),
                'napas' => set_value('napas', $row->napas),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'tglinput' => set_value('tglinput', $row->tglinput),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 't_asessment/t_asessment_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_asessment'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('noreg', TRUE));
        } else {
            $data = array(
                'bb' => $this->input->post('bb', TRUE),
                'tb' => $this->input->post('tb', TRUE),
                'sb' => $this->input->post('sb', TRUE),
                'sistole' => $this->input->post('sistole', TRUE),
                'diastole' => $this->input->post('diastole', TRUE),
                'nadi' => $this->input->post('nadi', TRUE),
                'napas' => $this->input->post('napas', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->T_asessment_model->update($this->input->post('noreg', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_asessment'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_asessment_model->get_by_id($id);

        if ($row) {
            $this->T_asessment_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_asessment'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_asessment'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('bb', 'bb', 'trim|required');
        $this->form_validation->set_rules('tb', 'tb', 'trim|required');
        $this->form_validation->set_rules('sb', 'sb', 'trim|required');
        $this->form_validation->set_rules('sistole', 'sistole', 'trim|required');
        $this->form_validation->set_rules('diastole', 'diastole', 'trim|required');
        $this->form_validation->set_rules('nadi', 'nadi', 'trim|required');
        $this->form_validation->set_rules('napas', 'napas', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('noreg', 'noreg', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file T_asessment.php */
/* Location: ./application/controllers/T_asessment.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-23 08:32:55 */
/* http://harviacode.com */
