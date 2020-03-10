<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-4">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>T_labhasil Read</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr>
                                <td>Nobill</td>
                                <td><?php echo $nama; ?></td>
                            </tr>
                            <tr>
                                <td>Noreg</td>
                                <td><?php echo $noreg; ?></td>
                            </tr>
                            <tr>
                                <td>Kdtarif</td>
                                <td><?php echo $alamat; ?></td>
                            </tr>
                            <tr>
                                <td>Nilai</td>
                                <td><?php echo $tgllhr; ?></td>
                            </tr>
                            <tr>
                                <td>Tglinput</td>
                                <td><?php echo $tglinput; ?></td>
                            </tr>
                            <tr>
                                <td>Id Users</td>
                                <td><?php echo $id_users; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-8">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>T_labhasil Read</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table m-0">
                            <thead class="bg-primary-500">
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="30%">Pemeriksaan</th>
                                    <!-- <th>Deskripsi</th> -->
                                    <th width="50%">Hasil</th>
                                    <th width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($list_rad as $rad) {
                                    if (!empty($rad->hasil)) {
                                        echo '<form action="' . base_url() . 't_radhasil/update_action/' . $rad->noreg . '" method="post">';
                                    } else {
                                        echo '<form action="' . base_url() . 't_radhasil/create_action" method="post">';
                                    }
                                    ?>

                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $rad->nmtarif ?></td>
                                        <!-- <td><?php echo $rad->deskripsi ?></td> -->
                                        <td>
                                            <input type="hidden" name="nobill" id="nobill" value="<?php echo $rad->labbill ?>">
                                            <input type="hidden" name="noreg" id="noreg" value="<?php echo $rad->noreg ?>">
                                            <input type="hidden" name="kdtarif" id="kdtarif" value="<?php echo $rad->kdtarif ?>">
                                            <textarea name="hasil" class="form-control"><?php echo $rad->hasil ?></textarea>
                                            <input type="hidden" name="tglinput" id="tglinput" value="<?php echo date('Y-m-d'); ?>" />
                                            <input type="hidden" name="id_users" id="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-info waves-effect waves-themed"><i class="fal fa-save"></i></button>
                                            <a href="<?php echo base_url(); ?>t_radhasil/upload/<?php echo $nobill ?>/<?php echo $noreg ?>/<?php echo $rad->kdtarif ?>" class="btn btn-sm btn-success waves-effect waves-themed">File</a>
                                        </td>
                                    </tr>
                                    </form>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>