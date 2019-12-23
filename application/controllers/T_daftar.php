<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_daftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_daftar_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_daftar/t_daftar_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_daftar_model->json();
    }

    public function read($id)
    {
        $row = $this->T_daftar_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idreg' => $row->idreg,
                'noreg' => $row->noreg,
                'nomr' => $row->nomr,
                'nama' => $row->nama,
                'nik' => $row->nik,
                'kelamin' => $row->kelamin,
                'kawin' => $row->kawin,
                'tgllhr' => $row->tgllhr,
                'baru' => $row->baru,
                'dokter' => $row->dokter,
                'poli' => $row->poli,
                'bayar' => $row->bayar,
                'kdbayar' => $row->kdbayar,
                'rujukan' => $row->rujukan,
                'kdrujuk' => $row->kdrujuk,
                'tglreg' => $row->tglreg,
                'petugas' => $row->id_users,
                'tarifgroup' => $this->T_daftar_model->get_tarif(),
                'tarifpaket' => $this->T_daftar_model->get_tarifpaket(),
                'listobat' => $this->T_daftar_model->get_obat(),

            );
            $this->template->load('template', 't_daftar/t_daftar_read', $data);

            //$this->template->load('template', 't_daftar/t_daftar_read',);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_daftar'));
        }
    }
    ////////////////////////////////////////////
    function data_barang($noreg)
    {
        $data = $this->T_daftar_model->barang_list($noreg);
        echo json_encode($data);
    }
    function paket_billing($noreg)
    {
        $data = $this->T_daftar_model->paket_bill_list($noreg);
        echo json_encode($data);
    }

    function simpan_barang()
    {
        $noreg = $this->input->post('noreg');
        $paket = $this->input->post('paket');
        $kdpaket = $this->input->post('kdpaket');
        $kdtarif = $this->input->post('kdtarif');
        $harga = $this->input->post('harga');
        $qty = $this->input->post('qty');
        $kdbayar = $this->input->post('kdbayar');
        $id_users = $this->session->userdata('id_users');
        $tgl = date('Y-m-d H:i:s');
        // cek nobill //
        $qcekbill = $this->db->query("SELECT nobill from t_billrajal where noreg='$noreg' and status='BL'");
        $cekbill = $qcekbill->num_rows();
        if ($cekbill > 0) {
            $dtbill = $qcekbill->row_array();
            $nobill = $dtbill['nobill'];
        } else {
            $qmaxbill = $this->db->query("SELECT max(nobill) as max_bill from t_billrajal")->row_array();
            $billhash = $qmaxbill['max_bill'] + 1;
            $nobill = str_pad($billhash, 6, '0', STR_PAD_LEFT);
        }

        if ($paket == 'N') {
            $cek = $this->db->query("SELECT * from t_billrajal where noreg='$noreg' and paket='N' and kdtarif='$kdtarif' and status='BL'");
        } else {
            $cek = $this->db->query("SELECT * from t_billrajal where noreg='$noreg' and paket='Y' and kdpaket='$kdpaket' and status='BL'");
        }
        $rows = $cek->num_rows();
        $dt = $cek->row_array();
        if ($rows > 0) {
            $qty = $dt['qty'] + $qty;
            $data = $this->T_daftar_model->update_barang($nobill, $noreg, $paket, $kdpaket, $kdtarif, $harga, $qty, $kdbayar, $id_users, $tgl);
        } else {
            $data = $this->T_daftar_model->simpan_barang($nobill, $noreg, $paket, $kdpaket, $kdtarif, $harga, $qty, $kdbayar, $id_users, $tgl);
        }
        echo json_encode($data);
    }

    function hapus_barang()
    {
        $idbill = $this->input->post('idbill');
        $data = $this->T_daftar_model->hapus_barang($idbill);
        echo json_encode($data);
    }
    //////////////////Paket Tarif//////////////////////////////
    function addpaket()
    {
        $noreg = $this->input->post('noreg');
        $paket = $this->input->post('paket');
        $kdpaket = $this->input->post('kdpaket');
        $kdtarif = $this->input->post('kdtarif');
        $qty = $this->input->post('qty');
        // cek bill //
        $cek = $this->db->query("SELECT * from t_billrajal where noreg='$noreg' and kdpaket='$kdpaket' and status='BL'");
        $rows = $cek->num_rows();
        $dt = $cek->row_array();
        if ($rows > 0) {
            $qty = $dt['qty'] + $qty;
            $data = $this->T_daftar_model->update_barang($noreg, $paket, $kdpaket, $kdtarif, $qty);
        } else {
            $data = $this->T_daftar_model->savepaket($noreg, $paket, $kdpaket, $kdtarif, $qty);
        }
        echo json_encode($data);
    }
    //////////////////////////////obat/////////////////////////////////////////
    function obat_billing($noreg)
    {
        $data = $this->T_daftar_model->obat_bill_list($noreg);
        echo json_encode($data);
    }
    function simpan_obat()
    {
        $noreg = $this->input->post('noreg');
        $user = $this->input->post('user');
        $kdobat = $this->input->post('kdobat');
        $hargaobat = $this->input->post('hargaobat');
        $qty = $this->input->post('qty');
        $kdbayar = $this->input->post('kdbayar');
        $id_users = $this->session->userdata('id_users');
        //cek
        $cekrajal = $this->db->query("SELECT * from t_billrajal where noreg='$noreg' and status='BL'");
        $rbill = $cekrajal->num_rows();
        $ceknobill = $cekrajal->row_array();
        if ($rbill > 0) {
            $nobill = $ceknobill['nobill'];
            // cek bill //
            $cek = $this->db->query("SELECT * from t_billobat where noreg='$noreg' and kdobat='$kdobat' and status='BL'");
            $rows = $cek->num_rows();
            $dt = $cek->row_array();
            $tgl = date('Y-m-d H:i:s');
            $status = 'BL';
            if ($rows > 0) {
                $qty = $dt['qty'] + $qty;
                $data = $this->T_daftar_model->update_obat($nobill, $noreg, $kdobat, $hargaobat, $qty, $kdbayar, $status, $tgl, $id_users);
            } else {
                $data = $this->T_daftar_model->simpan_obat($nobill, $noreg, $kdobat, $hargaobat, $qty, $kdbayar, $status, $tgl, $id_users);
            }
            echo json_encode($data);
        } else { }
    }
    function hapus_obat()
    {
        $idbill = $this->input->post('idbill');
        $data = $this->T_daftar_model->hapus_obat($idbill);
        echo json_encode($data);
    }
    ///////////////////////////////////////////////
    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_daftar/create_action'),
            'idreg' => set_value('idreg'),
            'noreg' => set_value('noreg'),
            'nomr' => set_value('nomr'),
            'baru' => set_value('baru'),
            'kddokter' => set_value('kddokter'),
            'kdpoli' => set_value('kdpoli'),
            'kdbayar' => set_value('kdbayar'),
            'rujukan' => set_value('rujukan'),
            'kdrujuk' => set_value('kdrujuk'),
            'tglreg' => set_value('tglreg'),
            'id_users' => set_value('id_users'),
            'jadwaldok' => $this->T_daftar_model->get_dokter(),
        );
        $this->template->load('template', 't_daftar/t_daftar_form', $data);
    }

    public function create_action()
    {
        $regdate = date('ym');
        $noregx = $regdate . $this->input->post('noreg', TRUE);

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'noreg' => $noregx,
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

            $this->T_daftar_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_daftar'));
        }
    }

    public function update($id)
    {
        $row = $this->T_daftar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_daftar/update_action'),
                'idreg' => set_value('idreg', $row->idreg),
                'noreg' => set_value('noreg', $row->noreg),
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
            $this->template->load('template', 't_daftar/t_daftar_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_daftar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('noreg', TRUE));
        } else {
            $data = array(
                'noreg' => $this->input->post('noreg', TRUE),
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

            $this->T_daftar_model->update($this->input->post('noreg', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_daftar'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_daftar_model->get_by_id($id);

        if ($row) {
            $this->T_daftar_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_daftar'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_daftar'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nomr', 'nomr', 'trim|required');
        $this->form_validation->set_rules('baru', 'baru', 'trim|required');
        $this->form_validation->set_rules('kddokter', 'kddokter', 'trim|required');
        $this->form_validation->set_rules('kdpoli', 'kdpoli', 'trim|required');
        $this->form_validation->set_rules('kdbayar', 'kdbayar', 'trim|required');
        $this->form_validation->set_rules('rujukan', 'rujukan', 'trim|required');
        $this->form_validation->set_rules('kdrujuk', 'kdrujuk', 'trim|required');
        $this->form_validation->set_rules('tglreg', 'tglreg', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('noreg', 'noreg', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file T_daftar.php */
/* Location: ./application/controllers/T_daftar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-23 06:32:59 */
/* http://harviacode.com */
