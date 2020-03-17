<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA M_DOKTERJADWAL</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="<?php echo $action; ?>" method="post">

                            <table class='table table-striped'>
                                <?php
                                if ($this->uri->segment(2) == 'create') {
                                    foreach ($dokter as $row) {
                                        $dtdokter = $row->kddokter;
                                    }
                                } else {
                                    $dtdokter = $kddokter;
                                } ?>
                                <tr>
                                    <td width='200'>Kddokter <?php echo form_error('kddokter') ?></td>
                                    <td><input type="text" class="form-control" name="kddokter" id="kddokter" placeholder="Kddokter" value="<?php echo $dtdokter; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>poli <?php echo form_error('kdpoli') ?></td>
                                    <td><?php echo cmb_dinamis('kdpoli', 'm_poli', 'poli', 'kdpoli') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Hari <?php echo form_error('hari') ?></td>
                                    <td><input type="text" class="form-control" name="hari" id="hari" placeholder="Hari" value="<?php echo $hari; ?>" /></td>
                                </tr>

                                <tr>
                                    <td width='200'>Jam Mulai <?php echo form_error('jam_mulai') ?></td>
                                    <td><input class="form-control" id="example-time-2" name="jam_mulai" id="jam_mulai" type="time" name="time" value="<?php echo $jam_mulai; ?>"></td>
                                </tr>
                                <tr>
                                    <td width='200'>Jam Akhir <?php echo form_error('jam_akhir') ?></td>
                                    <td><input class="form-control" id="example-time-2" name="jam_akhir" id="jam_akhir" type="time" name="time" value="<?php echo $jam_akhir; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="kdjadwal" value="<?php echo $kdjadwal; ?>" />
                                        <input type="text" class="form-control" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                        <input type="text" class="form-control" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" readonly />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_dokterjadwal') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>