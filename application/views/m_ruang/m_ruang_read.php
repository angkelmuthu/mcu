<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>M_ruang Read</h2>
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
                                <td>Ruang</td>
                                <td><?php echo $ruang; ?></td>
                            </tr>
                            <tr>
                                <td>unit</td>
                                <td><?php echo $unit; ?></td>
                            </tr>
                            <tr>
                                <td>Iskelas</td>
                                <td><?php echo ya($iskelas); ?></td>
                            </tr>
                            <tr>
                                <td>kelas</td>
                                <td><?php echo $kelas; ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>Rp. <?php echo angka($harga); ?></td>
                            </tr>
                            <tr>
                                <td>Aktif</td>
                                <td><?php echo ya($aktif); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?php echo site_url('m_ruang') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>M_ruang Read</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="<?php echo base_url(); ?>m_ruang/insbed" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="kdruang" value="<?php echo $this->uri->segment(3) ?> ">
                                <label class="form-label" for="button-addon5">No. Bed / No. Kamar</label>
                                <div class="input-group">
                                    <input type="text" name="nobed" class="form-control" aria-describedby="button-addon5">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary waves-effect waves-themed" type="submit" id="button-addon5"><i class="fal fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>No. Bed</th>
                                    <th>Aktif</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>

                            <body>
                                <?php
                                $no = 1;
                                foreach ($get_bed as $bed) { ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $bed->nobed ?></td>
                                        <td><?php echo ya($bed->aktif) ?></td>
                                        <td><button class="btn btn-xs btn-danger"><i class="fal fa-trash"></i></button></td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </body>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>