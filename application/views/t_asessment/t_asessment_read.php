<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
            <!-- profile summary -->
            <div class="card mb-g rounded-top">
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <img src="<?php echo base_url() ?>assets/smartadmin/img/demo/avatars/avatar-admin-lg.png" class="rounded-circle shadow-2 img-thumbnail" alt="">
                            <h5 class="mb-0 fw-700 text-center mt-3" style="text-transform: uppercase;">
                                <?php echo $nama ?>
                                <!-- <small class="text-muted mb-0"><?php echo $nomr ?></small> -->
                            </h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-sm align-self-end">
                                    <tbody>
                                        <tr>
                                            <td>NOMR</td>
                                            <td><b><?php echo $nomr ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><b><?php echo $kelamin ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td><b><?php echo $kawin ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-9 order-lg-3 order-xl-2">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>DATA TANDA VITAL</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-container show">
                        <div class="panel-content">
                            <table class="table table-bordered m-0">
                                <tbody>
                                    <tr>
                                        <td><strong>Berat Badan</strong></td>
                                        <td><?php echo $bb; ?> <i>Kg</i></td>
                                        <td><strong>Tinggi Badan</strong></td>
                                        <td><?php echo $tb; ?> <i>cm</i></td>
                                        <td><strong>Suhu Badan</strong></td>
                                        <td><?php echo $sb; ?> <i>C</i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sistole</strong></td>
                                        <td><?php echo $sistole; ?> <i>mmHg</i></td>
                                        <td><strong>Diastole</strong></td>
                                        <td><?php echo $diastole; ?> <i>mmHg</i></td>
                                        <td><strong>Nadi</strong></td>
                                        <td><?php echo $nadi; ?> <i>/menit</i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nafas</strong></td>
                                        <td><?php echo $napas; ?></td>
                                        <td><strong>Keterangan</strong></td>
                                        <td colspan="3"><?php echo $keterangan; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8"><i>Created : <?php echo $id_users; ?> ( <?php echo tanggal($tglinput) ?> )</i></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <div class="accordion" id="js_demo_accordion-2">
                                <?php
                                foreach ($getby_nomr as $getnomr) {
                                ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="javascript:void(0);" class="card-title collapsed" data-toggle="collapse" data-target="#js_demo_accordion-<?php echo $getnomr->noreg ?>" aria-expanded="false">
                                                <?php echo tanggal($getnomr->tglinput) ?>
                                            </a>
                                        </div>
                                        <div id="js_demo_accordion-<?php echo $getnomr->noreg ?>" class="collapse" data-parent="#js_demo_accordion-2">
                                            <div class="card-body">
                                                <?php
                                                $this->db->from('t_asessment');
                                                $this->db->where('noreg', $getnomr->noreg);
                                                $sqlvital = $this->db->get()->result();
                                                foreach ($sqlvital as $vital) {
                                                ?>
                                                    <table class="table table-bordered m-0">
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Berat Badan</strong></td>
                                                                <td><?php echo $vital->bb; ?> <i>Kg</i></td>
                                                                <td><strong>Tinggi Badan</strong></td>
                                                                <td><?php echo $vital->tb; ?> <i>cm</i></td>
                                                                <td><strong>Suhu Badan</strong></td>
                                                                <td><?php echo $sb; ?> <i>C</i></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Sistole</strong></td>
                                                                <td><?php echo $vital->sistole; ?> <i>mmHg</i></td>
                                                                <td><strong>Diastole</strong></td>
                                                                <td><?php echo $vital->diastole; ?> <i>mmHg</i></td>
                                                                <td><strong>Nadi</strong></td>
                                                                <td><?php echo $vital->nadi; ?> <i>/menit</i></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Nafas</strong></td>
                                                                <td><?php echo $vital->napas; ?></td>
                                                                <td><strong>Keterangan</strong></td>
                                                                <td colspan="3"><?php echo $vital->keterangan; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="8"><i>Created : <?php echo $vital->id_users; ?> ( <?php echo tanggal($vital->tglinput) ?> )</i></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">

        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>