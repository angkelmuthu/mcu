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
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_pasien/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_pasien/index/';
            $config['first_url'] = base_url() . 'index.php/m_pasien/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_pasien_model->total_rows($q);
        $m_pasien = $this->M_pasien_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_pasien_data' => $m_pasien,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'm_pasien/m_pasien_list', $data);
    }

    public function daftar()
    {
        $this->template->load('template', 'm_pasien/m_pasien_cari');
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
            redirect(site_url('T_daftar/metode_bayar/' . $baru . '/' . $nomr));
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

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_pasien.xls";
        $judul = "m_pasien";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nik");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgllhr");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Kodepos");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdklmn");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdkawin");
        xlsWriteLabel($tablehead, $kolomhead++, "Hp");
        xlsWriteLabel($tablehead, $kolomhead++, "Foto");
        xlsWriteLabel($tablehead, $kolomhead++, "Tglinput");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Users");

        foreach ($this->M_pasien_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nik);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgllhr);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteNumber($tablebody, $kolombody++, $data->kodepos);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdklmn);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdkawin);
            xlsWriteLabel($tablebody, $kolombody++, $data->hp);
            xlsWriteLabel($tablebody, $kolombody++, $data->foto);
            xlsWriteLabel($tablebody, $kolombody++, $data->tglinput);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_users);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file M_pasien.php */
/* Location: ./application/controllers/M_pasien.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-15 07:56:11 */
/* http://harviacode.com */
