<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>MASTER DATA PASIEN</h2>
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
                                $action = $this->uri->segment(2);
                                if ($action == 'create') {
                                    $user = $this->db->query("SELECT max(nomr) as max_nomr from m_pasien")->row_array();
                                    if (is_null($user['max_nomr'])) {
                                        $nomr_max = '000001';
                                    } else {
                                        $nomr_hash = $user['max_nomr'] + 1;
                                        $nomr_max = str_pad($nomr_hash, 6, '0', STR_PAD_LEFT);
                                    }
                                } else {
                                    $nomr_max = $nomr;
                                }
                                //print_r($this->db->last_query());
                                ?>
                                <tr>
                                    <td width='200'>NOMR</td>
                                    <td><input type="text" class="form-control" name="nomr" id="nomr" value="<?php echo $nomr_max; ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nik <?php echo form_error('nik') ?></td>
                                    <td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nama <?php echo form_error('nama') ?></td>
                                    <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tgllhr <?php echo form_error('tgllhr') ?></td>
                                    <td><input type="date" class="form-control" name="tgllhr" id="tgllhr" placeholder="Tgllhr" value="<?php echo $tgllhr; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Alamat <?php echo form_error('alamat') ?></td>
                                    <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kodepos <?php echo form_error('kodepos') ?></td>
                                    <td><input type="text" class="form-control" name="kodepos" id="kodepos" placeholder="Kodepos" value="<?php echo $kodepos; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdklmn <?php echo form_error('kdklmn') ?></td>
                                    <td><?php echo cmb_dinamis('kdklmn', 'm_kelamin', 'kelamin', 'kdklmn') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdkawin</td>
                                    <td><?php echo cmb_dinamis('kdkawin', 'm_kawin', 'kawin', 'kdkawin') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Hp</td>
                                    <td><input type="number" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Foto</td>
                                    <td><input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control" name="baru" value="<?php echo $this->uri->segment(3); ?>" readonly />
                                        <input type="hidden" class="form-control" name="tglinput" value="<?php echo date('Y-m-d'); ?>" />
                                        <input type="hidden" class="form-control" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_pasien') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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