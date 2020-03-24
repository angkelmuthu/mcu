<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_ruang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_ruang_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_ruang/m_ruang_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_ruang_model->json();
    }

    public function read($id)
    {
        $row = $this->M_ruang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'kdruang' => $row->kdruang,
                'ruang' => $row->ruang,
                'kdunit' => $row->kdunit,
                'unit' => $row->unit,
                'iskelas' => $row->iskelas,
                'kdkelas' => $row->kdkelas,
                'kelas' => $row->kelas,
                'harga' => $row->harga,
                'aktif' => $row->aktif,
                'get_bed' => $this->M_ruang_model->get_bed($id),
            );
            $this->template->load('template', 'm_ruang/m_ruang_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_ruang'));
        }
    }

    public function insbed()
    {
        $kdruang = $this->input->post('kdruang');
        $data = array(
            'nobed' => $this->input->post('nobed'),
            'kdruang' => $kdruang,
            'aktif' => 'Y',
        );
        $this->M_ruang_model->insbed($data);
        redirect(site_url('m_ruang/read/' . $kdruang));
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_ruang/create_action'),
            'kdruang' => set_value('kdruang'),
            'ruang' => set_value('ruang'),
            'kdunit' => set_value('kdunit'),
            'iskelas' => set_value('iskelas'),
            'kdkelas' => set_value('kdkelas'),
            'harga' => set_value('harga'),
            'aktif' => set_value('aktif'),
        );
        $this->template->load('template', 'm_ruang/m_ruang_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'ruang' => $this->input->post('ruang', TRUE),
                'kdunit' => $this->input->post('kdunit', TRUE),
                'iskelas' => $this->input->post('iskelas', TRUE),
                'kdkelas' => $this->input->post('kdkelas', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_ruang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_ruang'));
        }
    }

    public function update($id)
    {
        $row = $this->M_ruang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_ruang/update_action'),
                'kdruang' => set_value('kdruang', $row->kdruang),
                'ruang' => set_value('ruang', $row->ruang),
                'kdunit' => set_value('kdunit', $row->kdunit),
                'iskelas' => set_value('iskelas', $row->iskelas),
                'kdkelas' => set_value('kdkelas', $row->kdkelas),
                'harga' => set_value('harga', $row->harga),
                'aktif' => set_value('aktif', $row->aktif),
            );
            $this->template->load('template', 'm_ruang/m_ruang_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_ruang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdruang', TRUE));
        } else {
            $data = array(
                'ruang' => $this->input->post('ruang', TRUE),
                'kdunit' => $this->input->post('kdunit', TRUE),
                'iskelas' => $this->input->post('iskelas', TRUE),
                'kdkelas' => $this->input->post('kdkelas', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_ruang_model->update($this->input->post('kdruang', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_ruang'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_ruang_model->get_by_id($id);

        if ($row) {
            $this->M_ruang_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_ruang'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_ruang'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('ruang', 'ruang', 'trim|required');
        $this->form_validation->set_rules('kdunit', 'kdunit', 'trim|required');
        $this->form_validation->set_rules('iskelas', 'iskelas', 'trim|required');
        $this->form_validation->set_rules('kdkelas', 'kdkelas', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

        $this->form_validation->set_rules('kdruang', 'kdruang', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_ruang.xls";
        $judul = "m_ruang";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Ruang");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdunit");
        xlsWriteLabel($tablehead, $kolomhead++, "Iskelas");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdkelas");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga");
        xlsWriteLabel($tablehead, $kolomhead++, "Aktif");

        foreach ($this->M_ruang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->ruang);
            xlsWriteLabel($tablebody, $kolombody++, $data->kdunit);
            xlsWriteLabel($tablebody, $kolombody++, $data->iskelas);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdkelas);
            xlsWriteNumber($tablebody, $kolombody++, $data->harga);
            xlsWriteLabel($tablebody, $kolombody++, $data->aktif);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file M_ruang.php */
/* Location: ./application/controllers/M_ruang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-20 17:28:54 */
/* http://harviacode.com */
