<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA M_OBATSTOK</h2>
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
                                    <td width='200'>Nobatch <?php echo form_error('nobatch') ?></td>
                                    <td><input type="text" class="form-control" name="nobatch" id="nobatch" placeholder="Nobatch" value="<?php echo $nobatch; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdobat <?php echo form_error('kdobat') ?></td>
                                    <td><?php echo cmb_dinamis('kdobat', 'm_obat', 'nmobat', 'kdobat') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Expired <?php echo form_error('expired') ?></td>
                                    <td><input type="date" class="form-control" name="expired" id="expired" placeholder="Expired" value="<?php echo $expired; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Stok <?php echo form_error('stok') ?></td>
                                    <td><input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="idstok" value="<?php echo $idstok; ?>" />
                                        <input type="hidden" class="form-control" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                        <input type="hidden" class="form-control" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_obatstok') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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