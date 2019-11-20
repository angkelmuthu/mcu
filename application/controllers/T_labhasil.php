<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_labhasil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_labhasil_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_labhasil/t_labhasil_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_labhasil_model->json();
    }

    public function read($noreg)
    {
        $row = $this->T_labhasil_model->get_by_id($noreg);
        if ($row) {
            $data = array(
                'nama' => $row->nama,
                'noreg' => $row->noreg,
                'tgllhr' => $row->tgllhr,
                'alamat' => $row->alamat,
                'tglinput' => $row->tglinput,
                'id_users' => $row->id_users,
                'list_lab' => $this->T_labhasil_model->get_tindakan_lab($noreg),
            );
            $this->template->load('template', 't_labhasil/t_labhasil_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_labhasil'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_labhasil/create_action'),
            'nobill' => set_value('nobill'),
            'noreg' => set_value('noreg'),
            'kdtarif' => set_value('kdtarif'),
            'nilai' => set_value('nilai'),
            'tglinput' => set_value('tglinput'),
            'id_users' => set_value('id_users'),
        );
        $this->template->load('template', 't_labhasil/t_labhasil_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nobill' => $this->input->post('nobill', TRUE),
                'noreg' => $this->input->post('noreg', TRUE),
                'kdtarif' => $this->input->post('kdtarif', TRUE),
                'nilai' => $this->input->post('nilai', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->T_labhasil_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_labhasil'));
        }
    }

    public function update($id)
    {
        $row = $this->T_labhasil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_labhasil/update_action'),
                'nobill' => set_value('nobill', $row->nobill),
                'noreg' => set_value('noreg', $row->noreg),
                'kdtarif' => set_value('kdtarif', $row->kdtarif),
                'nilai' => set_value('nilai', $row->nilai),
                'tglinput' => set_value('tglinput', $row->tglinput),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 't_labhasil/t_labhasil_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_labhasil'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
                'nobill' => $this->input->post('nobill', TRUE),
                'noreg' => $this->input->post('noreg', TRUE),
                'kdtarif' => $this->input->post('kdtarif', TRUE),
                'nilai' => $this->input->post('nilai', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->T_labhasil_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_labhasil'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_labhasil_model->get_by_id($id);

        if ($row) {
            $this->T_labhasil_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_labhasil'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_labhasil'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nobill', 'nobill', 'trim|required');
        $this->form_validation->set_rules('noreg', 'noreg', 'trim|required');
        $this->form_validation->set_rules('kdtarif', 'kdtarif', 'trim|required');
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
        $this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file T_labhasil.php */
/* Location: ./application/controllers/T_labhasil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-19 07:44:03 */
/* http://harviacode.com */
