<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_radhasil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_radhasil_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_radhasil/t_radhasil_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_radhasil_model->json();
    }

    public function read($noreg)
    {
        $row = $this->T_radhasil_model->get_by_id($noreg);
        if ($row) {
            $data = array(
                'nama' => $row->nama,
                'noreg' => $row->noreg,
                'nobill' => $row->nobill,
                'tgllhr' => $row->tgllhr,
                'alamat' => $row->alamat,
                'tglinput' => $row->tglinput,
                'id_users' => $row->id_users,
                'list_rad' => $this->T_radhasil_model->get_tindakan_rad($noreg),
            );
            $this->template->load('template', 't_radhasil/t_radhasil_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_radhasil'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_radhasil/create_action'),
            'nobill' => set_value('nobill'),
            'noreg' => set_value('noreg'),
            'kdtarif' => set_value('kdtarif'),
            'hasil' => set_value('hasil'),
            'tglinput' => set_value('tglinput'),
            'id_users' => set_value('id_users'),
        );
        $this->template->load('template', 't_radhasil/t_radhasil_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'noreg' => $this->input->post('noreg', TRUE),
                'kdtarif' => $this->input->post('kdtarif', TRUE),
                'hasil' => $this->input->post('hasil', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->T_radhasil_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_radhasil'));
        }
    }

    public function update($id)
    {
        $row = $this->T_radhasil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_radhasil/update_action'),
                'nobill' => set_value('nobill', $row->nobill),
                'noreg' => set_value('noreg', $row->noreg),
                'kdtarif' => set_value('kdtarif', $row->kdtarif),
                'hasil' => set_value('hasil', $row->hasil),
                'tglinput' => set_value('tglinput', $row->tglinput),
                'id_users' => set_value('id_users', $row->id_users),
            );
            $this->template->load('template', 't_radhasil/t_radhasil_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_radhasil'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nobill', TRUE));
        } else {
            $data = array(
                'noreg' => $this->input->post('noreg', TRUE),
                'kdtarif' => $this->input->post('kdtarif', TRUE),
                'hasil' => $this->input->post('hasil', TRUE),
                'tglinput' => $this->input->post('tglinput', TRUE),
                'id_users' => $this->input->post('id_users', TRUE),
            );

            $this->T_radhasil_model->update($this->input->post('nobill', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_radhasil'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_radhasil_model->get_by_id($id);

        if ($row) {
            $this->T_radhasil_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_radhasil'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_radhasil'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('noreg', 'noreg', 'trim|required');
        $this->form_validation->set_rules('kdtarif', 'kdtarif', 'trim|required');
        $this->form_validation->set_rules('hasil', 'hasil', 'trim|required');
        $this->form_validation->set_rules('tglinput', 'tglinput', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('nobill', 'nobill', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function upload()
    {
        $nobill = $this->uri->segment(3);
        $noreg = $this->uri->segment(4);
        $kdtarif = $this->uri->segment(5);
        $data = array(
            'files' => $this->T_radhasil_model->getRows($nobill, $noreg, $kdtarif),
        );
        //$this->template->load('template', 't_radhasil/t_radhasil_form', $data);
        $this->template->load('template', 't_radhasil/t_radhasil_upload', $data);
    }

    function upload_files()
    {
        $nobill = $this->input->post('nobill');
        $noreg = $this->input->post('noreg');
        $kdtarif = $this->input->post('kdtarif');
        $data = array();
        // If file upload form submitted
        if ($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])) {
            $filesCount = count($_FILES['files']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                // File upload configuration
                $uploadPath = 'assets/file_radiologi/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload file to server
                if ($this->upload->do_upload('file')) {
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['nobill'] = $nobill;
                    $uploadData[$i]['noreg'] = $noreg;
                    $uploadData[$i]['kdtarif'] = $kdtarif;
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                }
            }

            if (!empty($uploadData)) {
                // Insert files data into the database
                $insert = $this->T_radhasil_model->upload($uploadData);

                // Upload status message
                $statusMsg = $insert ? '<div class="alert border-info bg-transparent text-info" role="alert">Files uploaded successfully.</div>' : '<div class="alert border-info bg-transparent text-info" role="alert">Some problem occurred, please try again.</div>';
                $this->session->set_flashdata('statusMsg', $statusMsg);
            }
        }

        // Get files data from the database
        //$data['files'] = $this->T_radhasil_model->getRows();

        // Pass the files data to view
        //$this->load->view('t_radhasil/t_radhasil_upload', $data);
        //$this->template->load('template', 't_radhasil/t_radhasil_upload');
        redirect(site_url('t_radhasil/upload/' . $nobill . '/' . $noreg . '/' . $kdtarif));
    }
}

/* End of file T_radhasil.php */
/* Location: ./application/controllers/T_radhasil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-21 06:44:33 */
/* http://harviacode.com */
