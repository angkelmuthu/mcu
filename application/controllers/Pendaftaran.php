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
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/pendaftaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/pendaftaran/index/';
            $config['first_url'] = base_url() . 'index.php/pendaftaran/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Pendaftaran_model->total_rows($q);
        $pendaftaran = $this->Pendaftaran_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pendaftaran_data' => $pendaftaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'pendaftaran/t_daftar_list', $data);
    }

    public function IGD()
    {
        $this->template->load('template', 'pendaftaran/pilih_metode');
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
