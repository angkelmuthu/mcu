<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_obatstok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_obatstok_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_obatstok/m_obatstok_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_obatstok_model->json();
    }

    public function read($id)
    {
        $row = $this->M_obatstok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idstok' => $row->idstok,
		'nobatch' => $row->nobatch,
		'kdobat' => $row->kdobat,
		'expired' => $row->expired,
		'stok' => $row->stok,
		'tglinput' => $row->tglinput,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','m_obatstok/m_obatstok_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatstok'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_obatstok/create_action'),
	    'idstok' => set_value('idstok'),
	    'nobatch' => set_value('nobatch'),
	    'kdobat' => set_value('kdobat'),
	    'expired' => set_value('expired'),
	    'stok' => set_value('stok'),
	    'tglinput' => set_value('tglinput'),
	    'id_users' => set_value('id_users'),
	);
        $this->template->load('template','m_obatstok/m_obatstok_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nobatch' => $this->input->post('nobatch',TRUE),
		'kdobat' => $this->input->post('kdobat',TRUE),
		'expired' => $this->input->post('expired',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_obatstok_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_obatstok'));
        }
    }

    public function update($id)
    {
        $row = $this->M_obatstok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_obatstok/update_action'),
		'idstok' => set_value('idstok', $row->idstok),
		'nobatch' => set_value('nobatch', $row->nobatch),
		'kdobat' => set_value('kdobat', $row->kdobat),
		'expired' => set_value('expired', $row->expired),
		'stok' => set_value('stok', $row->stok),
		'tglinput' => set_value('tglinput', $row->tglinput),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            $this->template->load('template','m_obatstok/m_obatstok_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatstok'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idstok', TRUE));
        } else {
            $data = array(
		'nobatch' => $this->input->post('nobatch',TRUE),
		'kdobat' => $this->input->post('kdobat',TRUE),
		'expired' => $this->input->post('expired',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_obatstok_model->update($this->input->post('idstok', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_obatstok'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_obatstok_model->get_by_id($id);

        if ($row) {
            $this->M_obatstok_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_obatstok'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obatstok'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nobatch', 'nobatch', 'trim|required');
	$this->form_validation->set_rules('kdobat', 'kdobat', 'trim|required');
	$this->form_validation->set_rules('expired', 'expired', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('idstok', 'idstok', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_obatstok.xls";
        $judul = "m_obatstok";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nobatch");
	xlsWriteLabel($tablehead, $kolomhead++, "Kdobat");
	xlsWriteLabel($tablehead, $kolomhead++, "Expired");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");
	xlsWriteLabel($tablehead, $kolomhead++, "Tglinput");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users");

	foreach ($this->M_obatstok_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nobatch);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kdobat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->expired);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tglinput);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_obatstok.php */
/* Location: ./application/controllers/M_obatstok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-18 04:21:41 */
/* http://harviacode.com */