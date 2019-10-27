<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
            <!-- profile summary -->
            <div class="card mb-g rounded-top">
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <img src="<?php echo base_url() ?>assets/smartadmin/img/demo/avatars/avatar-admin-lg.png" class="rounded-circle shadow-2 img-thumbnail" alt="">
                            <h5 class="mb-0 fw-700 text-center mt-3">
                                <?php echo $nama ?>
                                <!-- <small class="text-muted mb-0"><?php echo $nomr ?></small> -->
                            </h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-clean table-sm align-self-end">
                                    <tbody>
                                        <tr>
                                            <td>
                                                NOMR:
                                            </td>
                                            <td>
                                                <?php echo $nomr ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                NIK:
                                            </td>
                                            <td>
                                                <?php echo $nik ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Pembayaran:
                                            </td>
                                            <td>
                                                <?php echo $kdbayar ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Rujukan:
                                            </td>
                                            <td>
                                                <?php echo $rujukan ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center py-3">
                            <h5 class="mb-0 fw-700">
                                764
                                <small class="text-muted mb-0">Connections</small>
                            </h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center py-3">
                            <h5 class="mb-0 fw-700">
                                1,673
                                <small class="text-muted mb-0">Followers</small>
                            </h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 text-center">
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">Follow</a> <span class="text-primary d-inline-block mx-3">&#9679;</span>
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">Message</a> <span class="text-primary d-inline-block mx-3">&#9679;</span>
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">Connect</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 order-lg-3 order-xl-2">
            <div id="panel-10" class="panel">
                <div class="panel-hdr">
                    <h2>
                        REKAM MEDIS ELEKTRONIK <span class="fw-300"><i>(RME)</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#js_change_pill_justified-1">ASESSMENT DOKTER</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_change_pill_justified-2">TINDAKAN</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_change_pill_justified-3">RESEP</a></li>
                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade active show" id="js_change_pill_justified-1" role="tabpanel">
                                <?php
                                $this->db->select('*');
                                $this->db->from('t_emr');
                                $this->db->where('noreg', $noreg);
                                $query = $this->db->get();
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $row) {
                                        $idemr = $row->idemr;
                                        $action = 't_emr/update_action';
                                        $subjek = $row->subjek;
                                        $objek = $row->objek;
                                        $asessment = $row->asessment;
                                        $plann = $row->plann;
                                    }
                                } else {
                                    $idemr = '';
                                    $action = 't_emr/create_action';
                                    $subjek = '';
                                    $objek = '';
                                    $asessment = '';
                                    $plann = '';
                                }
                                //print_r($this->db->last_query());
                                ?>
                                <form action="<?php echo base_url() . $action ?>" method="post">
                                    <div class="col-12">
                                        <input type="hidden" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                        <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
                                        <input type="hidden" name="noreg" value="<?php echo $noreg ?>">
                                        <input type="hidden" name="idreg" value="<?php echo $idreg ?>">
                                        <input type="hidden" name="idemr" value="<?php echo $idemr ?>">
                                        <div class="form-group">
                                            <label class="form-label" for="example-textarea">Subjek</label>
                                            <textarea class="form-control" name="subjek" id="example-textarea" rows="2"><?php echo $subjek; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="example-textarea">Objek</label>
                                            <textarea class="form-control" name="objek" id="example-textarea" rows="2"><?php echo $objek; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="example-textarea">Asessment</label>
                                            <textarea class="form-control" name="asessment" id="example-textarea" rows="2"><?php echo $asessment; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="example-textarea">Planning</label>
                                            <textarea class="form-control" name="plann" id="example-textarea" rows="2"><?php echo $plann; ?></textarea>
                                        </div>
                                        <div class="p-3 text-center">
                                            <button type="submit" class="btn btn-sm btn-primary font-weight-bold">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_justified-2" role="tabpanel">

                            </div>
                            <div class="tab-pane fade" id="js_change_pill_justified-3" role="tabpanel">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 order-lg-2 order-xl-3">
            <!-- add : -->
            <!-- rating -->
            <div class="card mb-g">
                <div class="row row-grid no-gutters">
                    <div class="col-12">
                        <div class="p-3">
                            <h2 class="mb-0 fs-xl">
                                ASESSMENT PERAWAT
                            </h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <?php
                            $this->db->select('*');
                            $this->db->from('t_asessment');
                            $this->db->where('noreg', $noreg);
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $row) {
                                    $bb = $row->bb;
                                    $tb = $row->tb;
                                    $sb = $row->sb;
                                    $sistole = $row->sistole;
                                    $diastole = $row->diastole;
                                    $sb = $row->sb;
                                    $nadi = $row->nadi;
                                    $napas = $row->napas;
                                    $ket = $row->keterangan;
                                }
                            } else {
                                $bb = '';
                                $tb = '';
                                $sb = '';
                                $sistole = '';
                                $diastole = '';
                                $sb = '';
                                $nadi = '';
                                $napas = '';
                                $ket = '';
                            }
                            //print_r($this->db->last_query());
                            ?>
                            <div class="col-6">
                                <div class="p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-url">Berat Badan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $bb; ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-url">Tinggi Badan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $tb ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-url">Suhu Badan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $sb ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">C</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-url">Sistole</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $sistole ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-url">Diastole</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $diastole ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-url">Nadi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $nadi ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-url">Napas</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $napas ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="example-textarea">Keterangan</label>
                                        <textarea class="form-control" id="example-textarea" rows="3"><?php echo $ket ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="p-3 text-center">
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>