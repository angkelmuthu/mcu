<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_tarif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_tarif_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_tarif/m_tarif_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_tarif_model->json();
    }

    public function read($id)
    {
        $row = $this->M_tarif_model->get_by_id($id);
        if ($row) {
            $data = array(
                'kdtarif' => $row->kdtarif,
                'nmtarif' => $row->nmtarif,
                'kdpoli' => $row->kdpoli,
                'harga' => $row->harga,
                'tglinput' => $row->tglinput,
                'id_users' => $row->id_users,
            );
            $this->template->load('template', 'm_tarif/m_tarif_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_tarif/create_action'),
            'kdtarif' => set_value('kdtarif'),
            'nmtarif' => set_value('nmtarif'),
            'kdpoli' => set_value('kdpoli'),
            'harga' => set_value('harga'),
            'tglinput' => set_value('tglinput'),
            'id_users' => set_value('id_users'),
        );
        $this->template->load('template', 'm_tarif/m_tarif_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nmtarif' => $this->input->post('nmtarif', TRUE),
                'kdpoli' => $this->input->post('kdpoli', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->M_tarif_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }

    public function update($id)
    {
        $row = $this->M_tarif_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_tarif/update_action'),
                'kdtarif' => set_value('kdtarif', $row->kdtarif),
                'nmtarif' => set_value('nmtarif', $row->nmtarif),
                'kdpoli' => set_value('kdpoli', $row->kdpoli),
                'harga' => set_value('harga', $row->harga),
                'tglinput' => set_value('tglinput', $row->tglinput),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 'm_tarif/m_tarif_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdtarif', TRUE));
        } else {
            $data = array(
                'nmtarif' => $this->input->post('nmtarif', TRUE),
                'kdpoli' => $this->input->post('kdpoli', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->M_tarif_model->update($this->input->post('kdtarif', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_tarif_model->get_by_id($id);

        if ($row) {
            $this->M_tarif_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_tarif'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nmtarif', 'nmtarif', 'trim|required');
        $this->form_validation->set_rules('kdpoli', 'kdpoli', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('kdtarif', 'kdtarif', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_tarif.php */
/* Location: ./application/controllers/M_tarif.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 19:49:49 */
/* http://harviacode.com */
