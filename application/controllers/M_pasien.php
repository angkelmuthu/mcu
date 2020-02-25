<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_pasien_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_pasien/m_pasien_cari');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_pasien_model->json();
    }

    public function list()
    {
        $this->template->load('template', 'm_pasien/m_pasien_list');
    }

    public function read($id)
    {
        $row = $this->M_pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
                'nomr' => $row->nomr,
                'nik' => $row->nik,
                'nama' => $row->nama,
                'tgllhr' => $row->tgllhr,
                'alamat' => $row->alamat,
                'kodepos' => $row->kodepos,
                'kdklmn' => $row->kdklmn,
                'kdkawin' => $row->kdkawin,
                'hp' => $row->hp,
                'foto' => $row->foto,
                'tglinput' => $row->tglinput,
                'id_users' => $row->id_users,
            );
            $this->template->load('template', 'm_pasien/m_pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_pasien'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_pasien/create_action'),
            'nomr' => set_value('nomr'),
            'nik' => set_value('nik'),
            'nama' => set_value('nama'),
            'tgllhr' => set_value('tgllhr'),
            'alamat' => set_value('alamat'),
            'kodepos' => set_value('kodepos'),
            'kdklmn' => set_value('kdklmn'),
            'kdkawin' => set_value('kdkawin'),
            'hp' => set_value('hp'),
            'foto' => set_value('foto'),
            'tglinput' => set_value('tglinput'),
            'id_users' => set_value('id_users'),
        );
        $this->template->load('template', 'm_pasien/m_pasien_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nomr' => $this->input->post('nomr', TRUE),
                'nik' => $this->input->post('nik', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'tgllhr' => $this->input->post('tgllhr', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'kodepos' => $this->input->post('kodepos', TRUE),
                'kdklmn' => $this->input->post('kdklmn', TRUE),
                'kdkawin' => $this->input->post('kdkawin', TRUE),
                'hp' => $this->input->post('hp', TRUE),
                'foto' => $this->input->post('foto', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );
            $nomr = $this->input->post('nomr');
            $baru = $this->input->post('baru');
            $this->M_pasien_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('T_daftar/create/' . $baru . '/' . $nomr));
        }
    }

    public function update($id)
    {
        $row = $this->M_pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_pasien/update_action'),
                'nomr' => set_value('nomr', $row->nomr),
                'nik' => set_value('nik', $row->nik),
                'nama' => set_value('nama', $row->nama),
                'tgllhr' => set_value('tgllhr', $row->tgllhr),
                'alamat' => set_value('alamat', $row->alamat),
                'kodepos' => set_value('kodepos', $row->kodepos),
                'kdklmn' => set_value('kdklmn', $row->kdklmn),
                'kdkawin' => set_value('kdkawin', $row->kdkawin),
                'hp' => set_value('hp', $row->hp),
                'foto' => set_value('foto', $row->foto),
                'tglinput' => set_value('tglinput', $row->tglinput),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 'm_pasien/m_pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_pasien'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nomr', TRUE));
        } else {
            $data = array(
                'nik' => $this->input->post('nik', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'tgllhr' => $this->input->post('tgllhr', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'kodepos' => $this->input->post('kodepos', TRUE),
                'kdklmn' => $this->input->post('kdklmn', TRUE),
                'kdkawin' => $this->input->post('kdkawin', TRUE),
                'hp' => $this->input->post('hp', TRUE),
                'foto' => $this->input->post('foto', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->M_pasien_model->update($this->input->post('nomr', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_pasien'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_pasien_model->get_by_id($id);

        if ($row) {
            $this->M_pasien_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_pasien'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_pasien'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'nik', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('tgllhr', 'tgllhr', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('kodepos', 'kodepos', 'trim|required');
        $this->form_validation->set_rules('kdklmn', 'kdklmn', 'trim|required');
        $this->form_validation->set_rules('kdkawin', 'kdkawin', 'trim|required');
        // $this->form_validation->set_rules('hp', 'hp', 'trim|required');
        // $this->form_validation->set_rules('foto', 'foto', 'trim|required');
        $this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('nomr', 'nomr', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_pasien.php */
/* Location: ./application/controllers/M_pasien.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-22 07:48:27 */
/* http://harviacode.com */
