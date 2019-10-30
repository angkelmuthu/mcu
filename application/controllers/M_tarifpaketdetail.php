<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_tarifpaketdetail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_tarifpaketdetail_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_tarifpaketdetail/m_tarifpaketdetail_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_tarifpaketdetail_model->json();
    }

    public function read($id)
    {
        $row = $this->M_tarifpaketdetail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'kdpaketdetail' => $row->kdpaketdetail,
                'kdtarifpaket' => $row->kdtarifpaket,
                'kdtarif' => $row->kdtarif,
                'tglinput' => $row->tglinput,
                'id_users' => $row->id_users,
            );
            $this->template->load('template', 'm_tarifpaketdetail/m_tarifpaketdetail_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifpaketdetail'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_tarifpaketdetail/create_action'),
            'kdpaketdetail' => set_value('kdpaketdetail'),
            'kdtarifpaket' => set_value('kdtarifpaket'),
            'kdtarif' => set_value('kdtarif'),
            'tglinput' => set_value('tglinput'),
            'id_users' => set_value('id_users'),
        );
        $this->template->load('template', 'm_tarifpaketdetail/m_tarifpaketdetail_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kdtarifpaket' => $this->input->post('kdtarifpaket', TRUE),
                'kdtarif' => $this->input->post('kdtarif', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->M_tarifpaketdetail_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_tarifpaketdetail'));
        }
    }

    public function update($id)
    {
        $row = $this->M_tarifpaketdetail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_tarifpaketdetail/update_action'),
                'kdpaketdetail' => set_value('kdpaketdetail', $row->kdpaketdetail),
                'kdtarifpaket' => set_value('kdtarifpaket', $row->kdtarifpaket),
                'kdtarif' => set_value('kdtarif', $row->kdtarif),
                'tglinput' => set_value('tglinput', $row->tglinput),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 'm_tarifpaketdetail/m_tarifpaketdetail_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifpaketdetail'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdpaketdetail', TRUE));
        } else {
            $data = array(
                'kdtarifpaket' => $this->input->post('kdtarifpaket', TRUE),
                'kdtarif' => $this->input->post('kdtarif', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->M_tarifpaketdetail_model->update($this->input->post('kdpaketdetail', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_tarifpaketdetail'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_tarifpaketdetail_model->get_by_id($id);

        if ($row) {
            $this->M_tarifpaketdetail_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_tarifpaketdetail'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifpaketdetail'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kdtarifpaket', 'kdtarifpaket', 'trim|required');
        $this->form_validation->set_rules('kdtarif', 'kdtarif', 'trim|required');
        $this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('kdpaketdetail', 'kdpaketdetail', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_tarifpaketdetail.xls";
        $judul = "m_tarifpaketdetail";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdtarifpaket");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdtarif");
        xlsWriteLabel($tablehead, $kolomhead++, "Tglinput");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Users");

        foreach ($this->M_tarifpaketdetail_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdtarifpaket);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdtarif);
            xlsWriteLabel($tablebody, $kolombody++, $data->tglinput);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_users);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_tarifpaketdetail.doc");

        $data = array(
            'm_tarifpaketdetail_data' => $this->M_tarifpaketdetail_model->get_all(),
            'start' => 0
        );

        $this->load->view('m_tarifpaketdetail/m_tarifpaketdetail_doc', $data);
    }
}

/* End of file M_tarifpaketdetail.php */
/* Location: ./application/controllers/M_tarifpaketdetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-30 07:14:07 */
/* http://harviacode.com */
