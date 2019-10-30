<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_tarifpaket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_tarifpaket_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_tarifpaket/m_tarifpaket_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_tarifpaket_model->json();
    }

    public function read($id)
    {
        $row = $this->M_tarifpaket_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdtarifpaket' => $row->kdtarifpaket,
		'nmpaket' => $row->nmpaket,
		'potongan' => $row->potongan,
		'aktif' => $row->aktif,
		'tglinput' => $row->tglinput,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','m_tarifpaket/m_tarifpaket_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_tarifpaket/create_action'),
	    'kdtarifpaket' => set_value('kdtarifpaket'),
	    'nmpaket' => set_value('nmpaket'),
	    'potongan' => set_value('potongan'),
	    'aktif' => set_value('aktif'),
	    'tglinput' => set_value('tglinput'),
	    'id_users' => set_value('id_users'),
	);
        $this->template->load('template','m_tarifpaket/m_tarifpaket_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nmpaket' => $this->input->post('nmpaket',TRUE),
		'potongan' => $this->input->post('potongan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_tarifpaket_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function update($id)
    {
        $row = $this->M_tarifpaket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_tarifpaket/update_action'),
		'kdtarifpaket' => set_value('kdtarifpaket', $row->kdtarifpaket),
		'nmpaket' => set_value('nmpaket', $row->nmpaket),
		'potongan' => set_value('potongan', $row->potongan),
		'aktif' => set_value('aktif', $row->aktif),
		'tglinput' => set_value('tglinput', $row->tglinput),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            $this->template->load('template','m_tarifpaket/m_tarifpaket_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdtarifpaket', TRUE));
        } else {
            $data = array(
		'nmpaket' => $this->input->post('nmpaket',TRUE),
		'potongan' => $this->input->post('potongan',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_tarifpaket_model->update($this->input->post('kdtarifpaket', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_tarifpaket_model->get_by_id($id);

        if ($row) {
            $this->M_tarifpaket_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_tarifpaket'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarifpaket'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nmpaket', 'nmpaket', 'trim|required');
	$this->form_validation->set_rules('potongan', 'potongan', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');
	$this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('kdtarifpaket', 'kdtarifpaket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_tarifpaket.xls";
        $judul = "m_tarifpaket";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nmpaket");
	xlsWriteLabel($tablehead, $kolomhead++, "Potongan");
	xlsWriteLabel($tablehead, $kolomhead++, "Aktif");
	xlsWriteLabel($tablehead, $kolomhead++, "Tglinput");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users");

	foreach ($this->M_tarifpaket_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nmpaket);
	    xlsWriteNumber($tablebody, $kolombody++, $data->potongan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->aktif);
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
        header("Content-Disposition: attachment;Filename=m_tarifpaket.doc");

        $data = array(
            'm_tarifpaket_data' => $this->M_tarifpaket_model->get_all(),
            'start' => 0
        );

        $this->load->view('m_tarifpaket/m_tarifpaket_doc',$data);
    }

}

/* End of file M_tarifpaket.php */
/* Location: ./application/controllers/M_tarifpaket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-30 07:10:33 */
/* http://harviacode.com */