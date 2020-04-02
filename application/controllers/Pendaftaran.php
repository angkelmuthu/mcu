<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->template->load('template', 'pendaftaran/p1_installasi');
    }

    public function dua()
    {
        if ($this->session->flashdata('successx')) {
            $data = $this->session->flashdata('successx');
            $this->session->set_flashdata('success', $data);
            $this->template->load('template', 'pendaftaran/p2_dtpasien', $data);
        } elseif ($this->session->flashdata('errorx')) {
            //$data = $this->session->flashdata('errorx');
            $this->session->set_flashdata('error', 'fhgjgj');
            $this->template->load('template', 'pendaftaran/p2_dtpasien');
        } else {
            $this->template->load('template', 'pendaftaran/p2_dtpasien');
        }
        //$this->template->load('template', 'pendaftaran/pendaftaran2');
    }

    public function tiga()
    {
        $data = array(
            'metodebayar' => $this->Pendaftaran_model->metodebayar(),
        );
        $this->template->load('template', 'pendaftaran/p3_pembayaran', $data);
    }

    public function empat()
    {
        $unit = $this->uri->segment(3);
        $metode = $this->uri->segment(6);
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_daftar/create_action'),
            'get_poli' => $this->Pendaftaran_model->get_poli($unit),
            'get_bayar' => $this->Pendaftaran_model->get_bayar($metode),
            'get_ruang' => $this->Pendaftaran_model->get_ruang($unit),
        );
        $this->template->load('template', 'pendaftaran/p4_polibed', $data);
    }
    public function lima()
    {
        //$this->_rules();

        //if ($this->form_validation->run() == FALSE) {
        //$this->create();
        //redirect(site_url('pendaftaran'));
        //} else {
        $unit = $this->input->post('unit');
        $data = array(
            'noreg' => $this->input->post('noreg', TRUE),
            'nobill' => $this->input->post('nobill', TRUE),
            'nomr' => $this->input->post('nomr', TRUE),
            'baru' => $this->input->post('baru', TRUE),
            'unit' => $this->input->post('unit', TRUE),
            'kddokter' => $this->input->post('kddokter', TRUE),
            'kdpoli' => $this->input->post('kdpoli', TRUE),
            'kdbayar' => $this->input->post('kdbayar', TRUE),
            'rujukan' => $this->input->post('rujukan', TRUE),
            'kdrujuk' => $this->input->post('kdrujuk', TRUE),
            'tglreg' => $this->input->post('tglreg', TRUE),
            'id_users' => $this->input->post('id_users', TRUE),
        );
        $this->session->set_flashdata('pesan', $data);
        if ($unit == 'IGD' || $unit == 'RI') {
            $this->template->load('template', 'pendaftaran/p5_keluarga', $data);
        } else {
            $this->template->load('template', 'pendaftaran/p7_verifikasi', $data);
        }
        //}
    }

    function enam()
    {
        $kdbayar = $this->input->post('kdbayar');
        $data = array(
            'noreg' => $this->input->post('noreg', TRUE),
            'nobill' => $this->input->post('nobill', TRUE),
            'nomr' => $this->input->post('nomr', TRUE),
            'baru' => $this->input->post('baru', TRUE),
            'unit' => $this->input->post('unit', TRUE),
            'kddokter' => $this->input->post('kddokter', TRUE),
            'kdpoli' => $this->input->post('kdpoli', TRUE),
            'kdbayar' => $this->input->post('kdbayar', TRUE),
            'rujukan' => $this->input->post('rujukan', TRUE),
            'kdrujuk' => $this->input->post('kdrujuk', TRUE),
            'tglreg' => $this->input->post('tglreg', TRUE),
            'id_users' => $this->input->post('id_users', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'hp' => $this->input->post('hp', TRUE),
            'kdhub' => $this->input->post('kdhub', TRUE),
        );
        $this->session->set_flashdata('pesan', $data);
        if ($kdbayar == 2) {
            $this->template->load('template', 'pendaftaran/p7_verifikasi', $data);
        } else {
            $this->template->load('template', 'pendaftaran/p6_asuransi', $data);
        }
    }
    function tujuh()
    {
        $data = array(
            'noreg' => $this->input->post('noreg', TRUE),
            'nobill' => $this->input->post('nobill', TRUE),
            'nomr' => $this->input->post('nomr', TRUE),
            'baru' => $this->input->post('baru', TRUE),
            'unit' => $this->input->post('unit', TRUE),
            'kddokter' => $this->input->post('kddokter', TRUE),
            'kdpoli' => $this->input->post('kdpoli', TRUE),
            'kdbayar' => $this->input->post('kdbayar', TRUE),
            'rujukan' => $this->input->post('rujukan', TRUE),
            'kdrujuk' => $this->input->post('kdrujuk', TRUE),
            'tglreg' => $this->input->post('tglreg', TRUE),
            'id_users' => $this->input->post('id_users', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'hp' => $this->input->post('hp', TRUE),
            'kdhub' => $this->input->post('kdhub', TRUE),
        );
        $this->session->set_flashdata('pesan', $data);
        $this->template->load('template', 'pendaftaran/p7_verifikasi', $data);
    }
    function bed()
    {
        $id = $this->input->post('id');
        $data = $this->Pendaftaran_model->get_bed($id);
        echo json_encode($data);
    }
    function jadwaldokter()
    {
        $unit = $this->input->post('unit');
        $id = $this->input->post('id');
        $data = $this->Pendaftaran_model->get_jadwaldokter($id, $unit);
        echo json_encode($data);
    }
    public function tap()
    {
        $tap = $this->input->post('tap');
        $unit = $this->input->post('unit');
        $row = $this->Pendaftaran_model->tap($tap);
        if ($row) {
            $data = array(
                'nama' => set_value('nama', $row->nama),
                'tgllhr' => set_value('tgllhr', $row->tgllhr),
                'alamat' => set_value('alamat', $row->alamat),
                'nomr' => set_value('nomr', $row->nomr),
                'nik' => set_value('nik', $row->nik),
                'kdklmn' => set_value('kdklmn', $row->kdklmn),
                'hp' => set_value('hp', $row->hp),
                'foto' => set_value('foto', $row->foto),
            );
            $this->session->set_flashdata('successx', $data);
            //$this->template->load('template', 'pendaftaran/pendaftaran2', $data);
            redirect(site_url('pendaftaran/dua/' . $unit));
        } else {
            $this->session->set_flashdata('errorx', 'bbbbb');
            //$this->template->load('template', 'pendaftaran/pendaftaran2');
            redirect(site_url('pendaftaran/dua/' . $unit));
        }
    }

    public function read($id)
    {
        $row = $this->Pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idreg' => $row->idreg,
                'noreg' => $row->noreg,
                'nobill' => $row->nobill,
                'nomr' => $row->nomr,
                'baru' => $row->baru,
                'kddokter' => $row->kddokter,
                'kdpoli' => $row->kdpoli,
                'kdbayar' => $row->kdbayar,
                'rujukan' => $row->rujukan,
                'kdrujuk' => $row->kdrujuk,
                'tglreg' => $row->tglreg,
                'id_users' => $row->id_users,
            );
            $this->template->load('template', 'pendaftaran/t_daftar_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pendaftaran/create_action'),
            'idreg' => set_value('idreg'),
            'noreg' => set_value('noreg'),
            'nobill' => set_value('nobill'),
            'nomr' => set_value('nomr'),
            'baru' => set_value('baru'),
            'kddokter' => set_value('kddokter'),
            'kdpoli' => set_value('kdpoli'),
            'kdbayar' => set_value('kdbayar'),
            'rujukan' => set_value('rujukan'),
            'kdrujuk' => set_value('kdrujuk'),
            'tglreg' => set_value('tglreg'),
            'id_users' => set_value('id_users'),
        );
        $this->template->load('template', 'pendaftaran/t_daftar_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'noreg' => $this->input->post('noreg', TRUE),
                'nobill' => $this->input->post('nobill', TRUE),
                'nomr' => $this->input->post('nomr', TRUE),
                'baru' => $this->input->post('baru', TRUE),
                'kddokter' => $this->input->post('kddokter', TRUE),
                'kdpoli' => $this->input->post('kdpoli', TRUE),
                'kdbayar' => $this->input->post('kdbayar', TRUE),
                'rujukan' => $this->input->post('rujukan', TRUE),
                'kdrujuk' => $this->input->post('kdrujuk', TRUE),
                'tglreg' => $this->input->post('tglreg', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->Pendaftaran_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function update($id)
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendaftaran/update_action'),
                'idreg' => set_value('idreg', $row->idreg),
                'noreg' => set_value('noreg', $row->noreg),
                'nobill' => set_value('nobill', $row->nobill),
                'nomr' => set_value('nomr', $row->nomr),
                'baru' => set_value('baru', $row->baru),
                'kddokter' => set_value('kddokter', $row->kddokter),
                'kdpoli' => set_value('kdpoli', $row->kdpoli),
                'kdbayar' => set_value('kdbayar', $row->kdbayar),
                'rujukan' => set_value('rujukan', $row->rujukan),
                'kdrujuk' => set_value('kdrujuk', $row->kdrujuk),
                'tglreg' => set_value('tglreg', $row->tglreg),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 'pendaftaran/t_daftar_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idreg', TRUE));
        } else {
            $data = array(
                'noreg' => $this->input->post('noreg', TRUE),
                'nobill' => $this->input->post('nobill', TRUE),
                'nomr' => $this->input->post('nomr', TRUE),
                'baru' => $this->input->post('baru', TRUE),
                'kddokter' => $this->input->post('kddokter', TRUE),
                'kdpoli' => $this->input->post('kdpoli', TRUE),
                'kdbayar' => $this->input->post('kdbayar', TRUE),
                'rujukan' => $this->input->post('rujukan', TRUE),
                'kdrujuk' => $this->input->post('kdrujuk', TRUE),
                'tglreg' => $this->input->post('tglreg', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->Pendaftaran_model->update($this->input->post('idreg', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $this->Pendaftaran_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('pendaftaran'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('noreg', 'noreg', 'trim|required');
        $this->form_validation->set_rules('nobill', 'nobill', 'trim|required');
        $this->form_validation->set_rules('nomr', 'nomr', 'trim|required');
        $this->form_validation->set_rules('baru', 'baru', 'trim|required');
        $this->form_validation->set_rules('kddokter', 'kddokter', 'trim|required');
        $this->form_validation->set_rules('kdpoli', 'kdpoli', 'trim|required');
        $this->form_validation->set_rules('kdbayar', 'kdbayar', 'trim|required');
        $this->form_validation->set_rules('rujukan', 'rujukan', 'trim|required');
        $this->form_validation->set_rules('kdrujuk', 'kdrujuk', 'trim|required');
        $this->form_validation->set_rules('tglreg', 'tglreg', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('idreg', 'idreg', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_daftar.xls";
        $judul = "t_daftar";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Noreg");
        xlsWriteLabel($tablehead, $kolomhead++, "Nobill");
        xlsWriteLabel($tablehead, $kolomhead++, "Nomr");
        xlsWriteLabel($tablehead, $kolomhead++, "Baru");
        xlsWriteLabel($tablehead, $kolomhead++, "Kddokter");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdpoli");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdbayar");
        xlsWriteLabel($tablehead, $kolomhead++, "Rujukan");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdrujuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Tglreg");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Users");

        foreach ($this->Pendaftaran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->noreg);
            xlsWriteLabel($tablebody, $kolombody++, $data->nobill);
            xlsWriteLabel($tablebody, $kolombody++, $data->nomr);
            xlsWriteLabel($tablebody, $kolombody++, $data->baru);
            xlsWriteNumber($tablebody, $kolombody++, $data->kddokter);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdpoli);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdbayar);
            xlsWriteLabel($tablebody, $kolombody++, $data->rujukan);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdrujuk);
            xlsWriteLabel($tablebody, $kolombody++, $data->tglreg);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_users);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-22 12:39:41 */
/* http://harviacode.com */
