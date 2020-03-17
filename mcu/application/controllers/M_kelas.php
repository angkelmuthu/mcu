<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_kelas_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_kelas/m_kelas_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_kelas_model->json();
    }

    public function read($id)
    {
        $row = $this->M_kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdkelas' => $row->kdkelas,
		'kelas' => $row->kelas,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_kelas/m_kelas_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_kelas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_kelas/create_action'),
	    'kdkelas' => set_value('kdkelas'),
	    'kelas' => set_value('kelas'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_kelas/m_kelas_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kelas' => $this->input->post('kelas',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_kelas_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_kelas'));
        }
    }

    public function update($id)
    {
        $row = $this->M_kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_kelas/update_action'),
		'kdkelas' => set_value('kdkelas', $row->kdkelas),
		'kelas' => set_value('kelas', $row->kelas),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_kelas/m_kelas_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_kelas'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdkelas', TRUE));
        } else {
            $data = array(
		'kelas' => $this->input->post('kelas',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_kelas_model->update($this->input->post('kdkelas', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_kelas'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_kelas_model->get_by_id($id);

        if ($row) {
            $this->M_kelas_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_kelas'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_kelas'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('kdkelas', 'kdkelas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_kelas.xls";
        $judul = "m_kelas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Aktif");

	foreach ($this->M_kelas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_kelas.php */
/* Location: ./application/controllers/M_kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-14 15:31:50 */
/* http://harviacode.com */