<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA M_TARIFPAKETDETAIL</h2>
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

                                <tr>
                                    <td width='200'>Kdtarifpaket <?php echo form_error('kdtarifpaket') ?></td>
                                    <td><?php echo cmb_dinamis('kdtarifpaket', 'm_tarifpaket', 'nmpaket', 'kdtarifpaket') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdtarif <?php echo form_error('kdtarif') ?></td>
                                    <td><?php echo cmb_dinamis('kdtarif', 'm_tarif', 'nmtarif', 'kdtarif') ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="kdpaketdetail" value="<?php echo $kdpaketdetail; ?>" />
                                        <input type="text" class="form-control" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                        <input type="text" class="form-control" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" readonly />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_tarifpaketdetail') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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