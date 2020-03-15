<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_unit_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_unit/m_unit_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_unit_model->json();
    }

    public function read($id)
    {
        $row = $this->M_unit_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idunit' => $row->idunit,
		'kdunit' => $row->kdunit,
		'unit' => $row->unit,
	    );
            $this->template->load('template','m_unit/m_unit_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_unit/create_action'),
	    'idunit' => set_value('idunit'),
	    'kdunit' => set_value('kdunit'),
	    'unit' => set_value('unit'),
	);
        $this->template->load('template','m_unit/m_unit_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kdunit' => $this->input->post('kdunit',TRUE),
		'unit' => $this->input->post('unit',TRUE),
	    );

            $this->M_unit_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function update($id)
    {
        $row = $this->M_unit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_unit/update_action'),
		'idunit' => set_value('idunit', $row->idunit),
		'kdunit' => set_value('kdunit', $row->kdunit),
		'unit' => set_value('unit', $row->unit),
	    );
            $this->template->load('template','m_unit/m_unit_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idunit', TRUE));
        } else {
            $data = array(
		'kdunit' => $this->input->post('kdunit',TRUE),
		'unit' => $this->input->post('unit',TRUE),
	    );

            $this->M_unit_model->update($this->input->post('idunit', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_unit_model->get_by_id($id);

        if ($row) {
            $this->M_unit_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_unit'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_unit'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kdunit', 'kdunit', 'trim|required');
	$this->form_validation->set_rules('unit', 'unit', 'trim|required');

	$this->form_validation->set_rules('idunit', 'idunit', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_unit.xls";
        $judul = "m_unit";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kdunit");
	xlsWriteLabel($tablehead, $kolomhead++, "Unit");

	foreach ($this->M_unit_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdunit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unit);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_unit.doc");

        $data = array(
            'm_unit_data' => $this->M_unit_model->get_all(),
            'start' => 0
        );

        $this->load->view('m_unit/m_unit_doc',$data);
    }

}

/* End of file M_unit.php */
/* Location: ./application/controllers/M_unit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-15 07:26:11 */
/* http://harviacode.com */