<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA T_DAFTAR</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="<?php echo $action; ?>" method="post">
                            <?php
                            $action = $this->uri->segment(2);
                            if ($action == 'create') {
                                $user = $this->db->query("SELECT max(idreg) as max_idreg from t_daftar")->row_array();
                                if (is_null($user['max_idreg'])) {
                                    $noreg_max = '00001';
                                } else {
                                    $noreg_hash = $user['max_idreg'] + 1;
                                    $noreg_max = str_pad($noreg_hash, 5, '0', STR_PAD_LEFT);
                                }
                            } else {
                                $noreg_max = $noreg;
                            }
                            ?>
                            <table class='table table-striped'>

                                <tr>
                                    <td width='200'>Noreg</td>
                                    <td><input type="text" class="form-control" name="nomr" value="<?php echo $noreg_max; ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nomr <?php echo form_error('nomr') ?></td>
                                    <td><input type="text" class="form-control" name="nomr" id="nomr" placeholder="Nomr" value="<?php echo $this->uri->segment(4); ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Baru <?php echo form_error('baru') ?></td>
                                    <td><input type="text" class="form-control" name="baru" id="baru" placeholder="Baru" value="<?php echo $this->uri->segment(3); ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdpoli <?php echo form_error('kdpoli') ?></td>
                                    <td><input type="text" class="form-control" name="kdpoli" id="kdpoli" placeholder="Kdpoli" value="<?php echo $kdpoli; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kddokter <?php echo form_error('kddokter') ?></td>
                                    <td><input type="text" class="form-control" name="kddokter" id="kddokter" placeholder="Kddokter" value="<?php echo $kddokter; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdbayar <?php echo form_error('kdbayar') ?></td>
                                    <td><input type="text" class="form-control" name="kdbayar" id="kdbayar" placeholder="Kdbayar" value="<?php echo $kdbayar; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Rujukan <?php echo form_error('rujukan') ?></td>
                                    <td><input type="text" class="form-control" name="rujukan" id="rujukan" placeholder="Rujukan" value="<?php echo $rujukan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdrujuk <?php echo form_error('kdrujuk') ?></td>
                                    <td><input type="text" class="form-control" name="kdrujuk" id="kdrujuk" placeholder="Kdrujuk" value="<?php echo $kdrujuk; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="idreg" value="<?php echo $idreg; ?>" />
                                        <input type="text" class="form-control" name="tglreg" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                        <input type="text" class="form-control" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" readonly />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_daftar') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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