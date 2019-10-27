<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA T_EMR</h2>
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
                                    <td width='200'>Noreg <?php echo form_error('noreg') ?></td>
                                    <td><input type="text" class="form-control" name="noreg" id="noreg" placeholder="Noreg" value="<?php echo $noreg; ?>" /></td>
                                </tr>

                                <tr>
                                    <td width='200'>Subjek <?php echo form_error('subjek') ?></td>
                                    <td> <textarea class="form-control" rows="3" name="subjek" id="subjek" placeholder="Subjek"><?php echo $subjek; ?></textarea></td>
                                </tr>

                                <tr>
                                    <td width='200'>Objek <?php echo form_error('objek') ?></td>
                                    <td> <textarea class="form-control" rows="3" name="objek" id="objek" placeholder="Objek"><?php echo $objek; ?></textarea></td>
                                </tr>

                                <tr>
                                    <td width='200'>Asessment <?php echo form_error('asessment') ?></td>
                                    <td> <textarea class="form-control" rows="3" name="asessment" id="asessment" placeholder="Asessment"><?php echo $asessment; ?></textarea></td>
                                </tr>

                                <tr>
                                    <td width='200'>Plann <?php echo form_error('plann') ?></td>
                                    <td> <textarea class="form-control" rows="3" name="plann" id="plann" placeholder="Plann"><?php echo $plann; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tglinput <?php echo form_error('tglinput') ?></td>
                                    <td><input type="text" class="form-control" name="tglinput" id="tglinput" placeholder="Tglinput" value="<?php echo $tglinput; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Users <?php echo form_error('id_users') ?></td>
                                    <td><input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="idemr" value="<?php echo $idemr; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_emr') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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