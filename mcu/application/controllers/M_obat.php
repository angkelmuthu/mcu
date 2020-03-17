<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_obat_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_obat/m_obat_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_obat_model->json();
    }

    public function read($id)
    {
        $row = $this->M_obat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdobat' => $row->kdobat,
		'kdkatalog' => $row->kdkatalog,
		'kdfornas' => $row->kdfornas,
		'generik' => $row->generik,
		'nmobat' => $row->nmobat,
		'kdobatjenis' => $row->kdobatjenis,
		'dosis' => $row->dosis,
		'kdobatsatuan' => $row->kdobatsatuan,
		'kdobatcara' => $row->kdobatcara,
		'kdobatpakai' => $row->kdobatpakai,
		'hargaobat' => $row->hargaobat,
		'hashtag' => $row->hashtag,
		'tglinput' => $row->tglinput,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','m_obat/m_obat_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obat'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_obat/create_action'),
	    'kdobat' => set_value('kdobat'),
	    'kdkatalog' => set_value('kdkatalog'),
	    'kdfornas' => set_value('kdfornas'),
	    'generik' => set_value('generik'),
	    'nmobat' => set_value('nmobat'),
	    'kdobatjenis' => set_value('kdobatjenis'),
	    'dosis' => set_value('dosis'),
	    'kdobatsatuan' => set_value('kdobatsatuan'),
	    'kdobatcara' => set_value('kdobatcara'),
	    'kdobatpakai' => set_value('kdobatpakai'),
	    'hargaobat' => set_value('hargaobat'),
	    'hashtag' => set_value('hashtag'),
	    'tglinput' => set_value('tglinput'),
	    'id_users' => set_value('id_users'),
	);
        $this->template->load('template','m_obat/m_obat_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kdkatalog' => $this->input->post('kdkatalog',TRUE),
		'kdfornas' => $this->input->post('kdfornas',TRUE),
		'generik' => $this->input->post('generik',TRUE),
		'nmobat' => $this->input->post('nmobat',TRUE),
		'kdobatjenis' => $this->input->post('kdobatjenis',TRUE),
		'dosis' => $this->input->post('dosis',TRUE),
		'kdobatsatuan' => $this->input->post('kdobatsatuan',TRUE),
		'kdobatcara' => $this->input->post('kdobatcara',TRUE),
		'kdobatpakai' => $this->input->post('kdobatpakai',TRUE),
		'hargaobat' => $this->input->post('hargaobat',TRUE),
		'hashtag' => $this->input->post('hashtag',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_obat_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_obat'));
        }
    }

    public function update($id)
    {
        $row = $this->M_obat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_obat/update_action'),
		'kdobat' => set_value('kdobat', $row->kdobat),
		'kdkatalog' => set_value('kdkatalog', $row->kdkatalog),
		'kdfornas' => set_value('kdfornas', $row->kdfornas),
		'generik' => set_value('generik', $row->generik),
		'nmobat' => set_value('nmobat', $row->nmobat),
		'kdobatjenis' => set_value('kdobatjenis', $row->kdobatjenis),
		'dosis' => set_value('dosis', $row->dosis),
		'kdobatsatuan' => set_value('kdobatsatuan', $row->kdobatsatuan),
		'kdobatcara' => set_value('kdobatcara', $row->kdobatcara),
		'kdobatpakai' => set_value('kdobatpakai', $row->kdobatpakai),
		'hargaobat' => set_value('hargaobat', $row->hargaobat),
		'hashtag' => set_value('hashtag', $row->hashtag),
		'tglinput' => set_value('tglinput', $row->tglinput),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            $this->template->load('template','m_obat/m_obat_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obat'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdobat', TRUE));
        } else {
            $data = array(
		'kdkatalog' => $this->input->post('kdkatalog',TRUE),
		'kdfornas' => $this->input->post('kdfornas',TRUE),
		'generik' => $this->input->post('generik',TRUE),
		'nmobat' => $this->input->post('nmobat',TRUE),
		'kdobatjenis' => $this->input->post('kdobatjenis',TRUE),
		'dosis' => $this->input->post('dosis',TRUE),
		'kdobatsatuan' => $this->input->post('kdobatsatuan',TRUE),
		'kdobatcara' => $this->input->post('kdobatcara',TRUE),
		'kdobatpakai' => $this->input->post('kdobatpakai',TRUE),
		'hargaobat' => $this->input->post('hargaobat',TRUE),
		'hashtag' => $this->input->post('hashtag',TRUE),
		'tglinput' => $this->input->post('tglinput',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->M_obat_model->update($this->input->post('kdobat', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_obat'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_obat_model->get_by_id($id);

        if ($row) {
            $this->M_obat_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_obat'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_obat'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kdkatalog', 'kdkatalog', 'trim|required');
	$this->form_validation->set_rules('kdfornas', 'kdfornas', 'trim|required');
	$this->form_validation->set_rules('generik', 'generik', 'trim|required');
	$this->form_validation->set_rules('nmobat', 'nmobat', 'trim|required');
	$this->form_validation->set_rules('kdobatjenis', 'kdobatjenis', 'trim|required');
	$this->form_validation->set_rules('dosis', 'dosis', 'trim|required');
	$this->form_validation->set_rules('kdobatsatuan', 'kdobatsatuan', 'trim|required');
	$this->form_validation->set_rules('kdobatcara', 'kdobatcara', 'trim|required');
	$this->form_validation->set_rules('kdobatpakai', 'kdobatpakai', 'trim|required');
	$this->form_validation->set_rules('hargaobat', 'hargaobat', 'trim|required');
	$this->form_validation->set_rules('hashtag', 'hashtag', 'trim|required');
	$this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('kdobat', 'kdobat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_obat.php */
/* Location: ./application/controllers/M_obat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-18 06:49:30 */
/* http://harviacode.com */