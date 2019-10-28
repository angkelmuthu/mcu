<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kawinx extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_kawinx_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_kawinx/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_kawinx/index/';
            $config['first_url'] = base_url() . 'index.php/m_kawinx/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_kawinx_model->total_rows($q);
        $m_kawinx = $this->M_kawinx_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_kawinx_data' => $m_kawinx,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','m_kawinx/m_kawin_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_kawinx_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdkawin' => $row->kdkawin,
		'kawin' => $row->kawin,
	    );
            $this->template->load('template','m_kawinx/m_kawin_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_kawinx'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_kawinx/create_action'),
	    'kdkawin' => set_value('kdkawin'),
	    'kawin' => set_value('kawin'),
	);
        $this->template->load('template','m_kawinx/m_kawin_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kawin' => $this->input->post('kawin',TRUE),
	    );

            $this->M_kawinx_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_kawinx'));
        }
    }

    public function update($id)
    {
        $row = $this->M_kawinx_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_kawinx/update_action'),
		'kdkawin' => set_value('kdkawin', $row->kdkawin),
		'kawin' => set_value('kawin', $row->kawin),
	    );
            $this->template->load('template','m_kawinx/m_kawin_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_kawinx'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdkawin', TRUE));
        } else {
            $data = array(
		'kawin' => $this->input->post('kawin',TRUE),
	    );

            $this->M_kawinx_model->update($this->input->post('kdkawin', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_kawinx'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_kawinx_model->get_by_id($id);

        if ($row) {
            $this->M_kawinx_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_kawinx'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_kawinx'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kawin', 'kawin', 'trim|required');

	$this->form_validation->set_rules('kdkawin', 'kdkawin', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_kawinx.php */
/* Location: ./application/controllers/M_kawinx.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-28 04:50:39 */
/* http://harviacode.com */