<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
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
        <div class="col-xl-12">
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
                                    <th>Pemeriksaan</th>
                                    <th>Deskripsi</th>
                                    <th>Nilai Standar</th>
                                    <th width="10%">Hasil Lab</th>-*
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($list_lab as $lab) { ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $lab->nmlab ?></td>
                                        <td><?php echo $lab->deskripsi ?></td>
                                        <td><?php echo $lab->nilai_min . ' - ' . $lab->nilai_max ?></td>
                                        <td><input type="text" id="simpleinput" class="form-control"></td>
                                    </tr>
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