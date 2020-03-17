<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_tarif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_tarif_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_tarif/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_tarif/index/';
            $config['first_url'] = base_url() . 'index.php/m_tarif/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_tarif_model->total_rows($q);
        $m_tarif = $this->M_tarif_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_tarif_data' => $m_tarif,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'm_tarif/m_tarif_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_tarif_model->get_by_id($id);
        if ($row) {
            $data = array(
                'kdtarif' => $row->kdtarif,
                'nmtarif' => $row->nmtarif,
                'kdpoli' => $row->kdpoli,
                'paket' => $row->paket,
                'aktif' => $row->aktif,
                'tglinput' => $row->tglinput,
                'id_users' => $row->id_users,
                'get_tarifkelas' => $this->M_tarif_model->get_tarifkelas($id),
                'get_paket' => $this->M_tarif_model->get_paket($id),

            );
            $this->template->load('template', 'm_tarif/m_tarif_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_tarif/create_action'),
            'kdtarif' => set_value('kdtarif'),
            'nmtarif' => set_value('nmtarif'),
            'kdpoli' => set_value('kdpoli'),
            'paket' => set_value('paket'),
            'aktif' => set_value('aktif'),
            'tglinput' => set_value('tglinput'),
            'id_users' => set_value('id_users'),
        );
        $this->template->load('template', 'm_tarif/m_tarif_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nmtarif' => $this->input->post('nmtarif', TRUE),
                'kdpoli' => $this->input->post('kdpoli', TRUE),
                'paket' => $this->input->post('paket', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->M_tarif_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function insertharga()
    {
        $kdtarif = $this->input->post('kdtarif');
        $data = array(
            'kdkelas' => $this->input->post('kdkelas'),
            'kdtarif' => $this->input->post('kdtarif'),
            'harga' => $this->input->post('harga'),
            'tglinput' => $this->input->post('tglinput'),
            'id_users' => $this->input->post('id_users'),
        );

        //$this->db->insert('m_tarifkelas', $data);
        $this->M_tarif_model->insertharga($data);
        redirect(site_url('m_tarif/read/' . $kdtarif));
    }
    public function insertpaket()
    {
        $kdtarif = $this->input->post('kdtarif');
        $data = array(
            'kdtarifpaket' => $this->input->post('kdtarifpaket'),
            'kdtarif' => $this->input->post('kdtarif'),
            'kdsubtarif' => $this->input->post('kdsubtarif'),
            'tglinput' => $this->input->post('tglinput'),
            'id_users' => $this->input->post('id_users'),
        );

        //$this->db->insert('m_tarifkelas', $data);
        $this->M_tarif_model->insertpaket($data);
        redirect(site_url('m_tarif/read/' . $kdtarif));
    }

    public function searchtarif($id)
    {
        // tangkap variabel keyword dari URL
        $keyword = $this->uri->segment(3);

        // cari di database
        // $this->db->from('m_tarif');
        // $this->db->where('kdtarif', $id);
        // $this->db->like('nmtarif', $keyword);
        // $data = $this->db->get()->result();
        $data = $this->db->from('m_tarif')->where('paket', 'N')->like('nmtarif', $keyword)->get();

        // format keluaran di dalam array
        foreach ($data->result() as $row) {
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value'    => $row->nmtarif,
                'nim'    => $row->kdtarif,
                'jurusan'    => $row->kdpoli

            );
        }
        // minimal PHP 5.2
        echo json_encode($arr);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function update($id)
    {
        $row = $this->M_tarif_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_tarif/update_action'),
                'kdtarif' => set_value('kdtarif', $row->kdtarif),
                'nmtarif' => set_value('nmtarif', $row->nmtarif),
                'kdpoli' => set_value('kdpoli', $row->kdpoli),
                'paket' => set_value('paket', $row->paket),
                'aktif' => set_value('aktif', $row->aktif),
                'tglinput' => set_value('tglinput', $row->tglinput),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 'm_tarif/m_tarif_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdtarif', TRUE));
        } else {
            $data = array(
                'nmtarif' => $this->input->post('nmtarif', TRUE),
                'kdpoli' => $this->input->post('kdpoli', TRUE),
                'paket' => $this->input->post('paket', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->M_tarif_model->update($this->input->post('kdtarif', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_tarif_model->get_by_id($id);

        if ($row) {
            $this->M_tarif_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_tarif'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_tarif'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nmtarif', 'nmtarif', 'trim|required');
        $this->form_validation->set_rules('kdpoli', 'kdpoli', 'trim|required');
        $this->form_validation->set_rules('paket', 'paket', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');
        $this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('kdtarif', 'kdtarif', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_tarif.php */
/* Location: ./application/controllers/M_tarif.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-15 05:46:47 */
/* http://harviacode.com */
