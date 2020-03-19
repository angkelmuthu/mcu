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
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/t_daftar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/t_daftar/index/';
            $config['first_url'] = base_url() . 'index.php/t_daftar/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->T_daftar_model->total_rows($q);
        $t_daftar = $this->T_daftar_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_daftar_data' => $t_daftar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 't_daftar/t_daftar_list', $data);
    }
    public function unit()
    {
        $unit = $this->uri->segment(3);
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/t_daftar/unit/' . $unit . '/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/t_daftar/unit/' . $unit . '/index/';
            $config['first_url'] = base_url() . 'index.php/t_daftar/unit/' . $unit . '/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->T_daftar_model->total_rows_unit($unit, $q);
        $t_daftar = $this->T_daftar_model->get_limit_data_unit($config['per_page'], $start, $unit, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_daftar_data' => $t_daftar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 't_daftar/t_daftar_list_unit', $data);
    }

    public function read($id)
    {
        $row = $this->T_daftar_model->get_by_id($id);
        $kdpoli = $row->kdpoli;
        if ($row) {
            $data = array(
                'idreg' => $row->idreg,
                'noreg' => $row->noreg,
                'nobill' => $row->nobill,
                'nomr' => $row->nomr,
                'nama' => $row->nama,
                'nik' => $row->nik,
                'kelamin' => $row->kelamin,
                'kawin' => $row->kawin,
                'tgllhr' => $row->tgllhr,
                'baru' => $row->baru,
                'kddokter' => $row->kddokter,
                'dokter' => $row->dokter,
                'kdpoli' => $row->kdpoli,
                'poli' => $row->poli,
                'bayar' => $row->bayar,
                'kdbayar' => $row->kdbayar,
                'rujukan' => $row->rujukan,
                'kdrujuk' => $row->kdrujuk,
                'tglreg' => $row->tglreg,
                'petugas' => $row->id_users,
                'listtarif' => $this->T_daftar_model->get_tarif($kdpoli),
                'listobat' => $this->T_daftar_model->get_obat(),
                'get_penunjang' => $this->T_daftar_model->get_penunjang($row->noreg),
            );
            $this->template->load('template', 't_daftar/t_daftar_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_daftar'));
        }
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

        foreach ($this->T_daftar_model->get_all() as $data) {
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
    ////////////////////////modifikasi/////////////////////////////////////////////////////
    ////////////////////////////////////////////
    function data_barang($noreg, $kddokter)
    {
        $data = $this->T_daftar_model->barang_list($noreg, $kddokter);
        echo json_encode($data);
    }

    function simpan_barang()
    {
        $noreg = $this->input->post('noreg');
        $nobill = $this->input->post('nobill');
        $kdpoli = $this->input->post('kdpoli');
        $kddokter = $this->input->post('kddokter');
        $paket = $this->input->post('paket');
        $kdtarif = $this->input->post('kdtarif');
        $harga = $this->input->post('harga');
        $qty = $this->input->post('qty');
        $kdbayar = $this->input->post('kdbayar');
        $id_users = $this->session->userdata('id_users');
        $tgl = date('Y-m-d H:i:s');
        // cek nobill //
        // $qcekbill = $this->db->query("SELECT nobill from t_billrajal where noreg='$noreg' and status='BL'");
        // $cekbill = $qcekbill->num_rows();
        // if ($cekbill > 0) {
        //     $dtbill = $qcekbill->row_array();
        //     $nobill = $dtbill['nobill'];
        // } else {
        //     $qmaxbill = $this->db->query("SELECT max(nobill) as max_bill from t_billrajal")->row_array();
        //     $billhash = $qmaxbill['max_bill'] + 1;
        //     $nobill = str_pad($billhash, 6, '0', STR_PAD_LEFT);
        // }

        $cek = $this->db->query("SELECT * from t_billrajal where kdtarif='$kdtarif' and kddokter='$kddokter' and nobill='$nobill' and status='BL'");
        $rows = $cek->num_rows();
        $dt = $cek->row_array();
        if ($rows > 0) {
            $qty = $dt['qty'] + $qty;
            $data = $this->T_daftar_model->update_barang($nobill, $noreg, $kdpoli, $kddokter, $paket, $kdtarif, $harga, $qty, $kdbayar, $id_users, $tgl);
        } else {
            $data = $this->T_daftar_model->simpan_barang($nobill, $noreg, $kdpoli, $kddokter, $paket, $kdtarif, $harga, $qty, $kdbayar, $id_users, $tgl);
        }
        echo json_encode($data);
    }

    function hapus_barang()
    {
        $idbill = $this->input->post('idbill');
        $data = $this->T_daftar_model->hapus_barang($idbill);
        echo json_encode($data);
    }

    //////////////////////////////obat/////////////////////////////////////////
    function obat_billing($noreg, $kddokter)
    {
        $data = $this->T_daftar_model->obat_bill_list($noreg, $kddokter);
        echo json_encode($data);
    }
    function simpan_obat()
    {
        $noreg = $this->input->post('noreg');
        $kdpoli = $this->input->post('kdpoli');
        $kddokter = $this->input->post('kddokter');
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
            $cek = $this->db->query("SELECT * from t_billobat where noreg='$noreg' and kdobat='$kdobat' and kddokter='$kddokter' and status='BL'");
            $rows = $cek->num_rows();
            $dt = $cek->row_array();
            $tgl = date('Y-m-d H:i:s');
            $status = 'BL';
            if ($rows > 0) {
                $qty = $dt['qty'] + $qty;
                $data = $this->T_daftar_model->update_obat($nobill, $noreg, $kdpoli, $kddokter, $kdobat, $hargaobat, $qty, $kdbayar, $status, $tgl, $id_users);
            } else {
                $data = $this->T_daftar_model->simpan_obat($nobill, $noreg, $kdpoli, $kddokter, $kdobat, $hargaobat, $qty, $kdbayar, $status, $tgl, $id_users);
            }
            echo json_encode($data);
        } else {
        }
    }
    function hapus_obat()
    {
        $idbill = $this->input->post('idbill');
        $data = $this->T_daftar_model->hapus_obat($idbill);
        echo json_encode($data);
    }
    //////////////////////////////icd/////////////////////////////////////////
    function list_icd($noreg, $kddokter)
    {
        $data = $this->T_daftar_model->list_icd($noreg, $kddokter);
        echo json_encode($data);
    }

    function simpan_icd()
    {
        $noreg = $this->input->post('noreg');
        $nobill = $this->input->post('nobill');
        $kddokter = $this->input->post('kddokter');
        $flag = $this->input->post('flag');
        $jns = $this->input->post('jns');
        $ket = $this->input->post('ket');
        $icd = $this->input->post('icd');
        $codex = explode(" - ", $icd);
        $code = $codex[0];
        $tglinput = date("Y-m-d h:s:i");
        $id_users = $this->session->userdata('id_users');
        $data = $this->T_daftar_model->simpan_icd($nobill, $noreg, $kddokter, $flag, $jns, $ket, $code, $tglinput, $id_users);
        echo json_encode($data);
    }
    function hapus_icd()
    {
        $idicd = $this->input->post('idicd');
        $data = $this->T_daftar_model->hapus_icd($idicd);
        echo json_encode($data);
    }
    ///////////////////////////////////////////////////////////////////
    function list_icd9($noreg, $kddokter)
    {
        $data = $this->T_daftar_model->list_icd9($noreg, $kddokter);
        echo json_encode($data);
    }
    function simpan_icd9()
    {
        $noreg = $this->input->post('noreg');
        $nobill = $this->input->post('nobill');
        $kddokter = $this->input->post('kddokter');
        $flag = $this->input->post('flag');
        $jns = $this->input->post('jns');
        $ket = $this->input->post('ket');
        $icd = $this->input->post('icd');
        $codex = explode(" - ", $icd);
        $code = $codex[0];
        $tglinput = date("Y-m-d h:s:i");
        $id_users = $this->session->userdata('id_users');
        $data = $this->T_daftar_model->simpan_icd9($nobill, $noreg, $kddokter, $flag, $jns, $ket, $code, $tglinput, $id_users);
        echo json_encode($data);
    }
    function hapus_icd9()
    {
        $idicd = $this->input->post('idicd');
        $data = $this->T_daftar_model->hapus_icd9($idicd);
        echo json_encode($data);
    }
    ///////////////////////////////////////////////
    function get_icd10()
    {
        if (isset($_GET['term'])) {
            $result = $this->T_daftar_model->search_icd10($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->code . ' - ' . $row->description;
                echo json_encode($arr_result);
            }
        }
    }
    ////////////////////////////////////////////////
    public function metode_bayar()
    {
        $this->template->load('template', 't_daftar/t_daftar_cr_bayar');
    }
    public function unitopt()
    {
        $this->template->load('template', 't_daftar/t_pilih_unit');
    }
    ///////////////////////////////////////////////
    public function create()
    {
        $unit=$this->uri->segment(6);
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_daftar/create_action'),
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
            'jadwaldok' => $this->T_daftar_model->get_dokter(),
            'get_metode' => $this->T_daftar_model->get_metode(),
            'get_poli' => $this->T_daftar_model->get_poli($unit),
        );
        $this->template->load('template', 't_daftar/t_daftar_form', $data);
    }
    function get_bayar()
    {
        $id = $this->input->post('id');
        $data = $this->T_daftar_model->get_bayar($id);
        echo json_encode($data);
    }
    function jadwaldokter()
    {
        $id = $this->input->post('id');
        $data = $this->T_daftar_model->get_jadwaldokter($id);
        echo json_encode($data);
    }
    public function create_action()
    {
        //$regdate = date('ym');
        //$noregx = $regdate . $this->input->post('noreg', TRUE);

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $nobill = date("m.y", strtotime($this->input->post('tglreg'))) . "." . $this->input->post('kdpoli') . "." . $this->input->post('noreg');
            $data = array(
                //'noreg' => $noregx,
                'noreg' => $this->input->post('noreg', TRUE),
                'nobill' => $nobill,
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
        $this->form_validation->set_rules('kdrujuk', 'kdrujuk');
        $this->form_validation->set_rules('tglreg', 'tglreg', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');

        $this->form_validation->set_rules('noreg', 'noreg', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    ////////////////////////////////////////////////////////
    public function ins_soap()
    {
        $url = $this->input->post('url');
        $data = array(
            //'noreg' => $noregx,
            'noreg' => $this->input->post('noreg', TRUE),
            'nobill' => $this->input->post('nobill', TRUE),
            'alergi' => $this->input->post('alergi', TRUE),
            'keluhan' => $this->input->post('keluhan', TRUE),
            'kddokter' => $this->input->post('kddokter', TRUE),
            'r_penyakit' => $this->input->post('r_penyakit', TRUE),
            'instruksi' => $this->input->post('instruksi', TRUE),
            'tglinput' => $this->input->post('tglinput', TRUE),
            'id_users' => $this->input->post('id_users', TRUE),
        );

        $this->T_daftar_model->ins_soap($data);
        // $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true"><i class="fal fa-times"></i></span>
        //     </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_daftar/read/' . $url));
    }
    public function updt_soap()
    {
        $url = $this->input->post('url');
        $idsoap = $this->input->post('idsoap');
        $data = array(
            'noreg' => $this->input->post('noreg', TRUE),
            'nobill' => $this->input->post('nobill', TRUE),
            'alergi' => $this->input->post('alergi', TRUE),
            'keluhan' => $this->input->post('keluhan', TRUE),
            'kddokter' => $this->input->post('kddokter', TRUE),
            'r_penyakit' => $this->input->post('r_penyakit', TRUE),
            'instruksi' => $this->input->post('instruksi', TRUE),
            'tglinput' => $this->input->post('tglinput', TRUE),
            'id_users' => $this->input->post('id_users', TRUE),
        );

        $this->T_daftar_model->updt_soap($idsoap, $data);
        // $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true"><i class="fal fa-times"></i></span>
        //     </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_daftar/read/' . $url));
    }
    function get_subkategori()
    {
        $id = $this->input->post('id');
        $data = $this->m_kategori->get_subkategori($id);
        echo json_encode($data);
    }
}

/* End of file T_daftar.php */
/* Location: ./application/controllers/T_daftar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-15 08:51:59 */
/* http://harviacode.com */
