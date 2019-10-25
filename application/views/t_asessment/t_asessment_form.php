<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA T_ASESSMENT</h2>
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
                                    <td width='200'>Bb <?php echo form_error('bb') ?></td>
                                    <td><input type="text" class="form-control" name="bb" id="bb" placeholder="Bb" value="<?php echo $bb; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tb <?php echo form_error('tb') ?></td>
                                    <td><input type="text" class="form-control" name="tb" id="tb" placeholder="Tb" value="<?php echo $tb; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Sb <?php echo form_error('sb') ?></td>
                                    <td><input type="text" class="form-control" name="sb" id="sb" placeholder="Sb" value="<?php echo $sb; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Sistole <?php echo form_error('sistole') ?></td>
                                    <td><input type="text" class="form-control" name="sistole" id="sistole" placeholder="Sistole" value="<?php echo $sistole; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Diastole <?php echo form_error('diastole') ?></td>
                                    <td><input type="text" class="form-control" name="diastole" id="diastole" placeholder="Diastole" value="<?php echo $diastole; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nadi <?php echo form_error('nadi') ?></td>
                                    <td><input type="text" class="form-control" name="nadi" id="nadi" placeholder="Nadi" value="<?php echo $nadi; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Napas <?php echo form_error('napas') ?></td>
                                    <td><input type="text" class="form-control" name="napas" id="napas" placeholder="Napas" value="<?php echo $napas; ?>" /></td>
                                </tr>

                                <tr>
                                    <td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
                                    <td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="text" name="noreg" value="<?php echo $this->uri->segment(3); ?>" />
                                        <input type="text" class="form-control" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                        <input type="text" class="form-control" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" readonly />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_asessment') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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