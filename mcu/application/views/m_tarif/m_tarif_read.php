<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Tarif</h2>
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
                                <td>Nmtarif</td>
                                <td><?php echo $nmtarif; ?></td>
                                <td>Kdpoli</td>
                                <td><?php echo $kdpoli; ?></td>
                                <td>Paket</td>
                                <td><?php echo ya($paket); ?></td>
                            </tr>
                            <tr>
                                <td>Aktif</td>
                                <td><?php echo aktif($aktif); ?></td>
                                <td>Tglinput</td>
                                <td><?php echo $tglinput; ?></td>
                                <td>Id Users</td>
                                <td><?php echo $id_users; ?></td>
                            </tr>
                            <!-- <tr>
                                <td></td>
                                <td><a href="<?php echo site_url('m_tarif') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Harga Tarif</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>kelas</th>
                                    <th>Harga</th>
                                    <th>Tglinput</th>
                                    <th>Id Users</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($get_tarifkelas as $tarifkelas) { ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $tarifkelas->kelas ?></td>
                                        <td><?php echo angka($tarifkelas->harga) ?></td>
                                        <td><?php echo tanggal($tarifkelas->tglinput) ?></td>
                                        <td><?php echo $tarifkelas->id_users ?></td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#default-example-modal-center"><i class="fal fa-plus-square" aria-hidden="true"></i> Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal center -->
        <div class="modal fade" id="default-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Input Tarif Perkelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <form action="<?php echo base_url(); ?>m_tarif/insertharga" method="post">
                        <div class="modal-body">
                            <table class="table table-striped">
                                <tr>
                                    <td width='200'>Kelas</td>
                                    <td><?php echo cmb_dinamis('kdkelas', 'm_kelas', 'kelas', 'kdkelas') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga</td>
                                    <td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="" /></td>
                                </tr>
                                <input type="hidden" name="id" value="" />
                                <input type="hidden" class="form-control" name="kdtarif" value="<?php echo $this->uri->segment('3'); ?>" readonly />
                                <input type="hidden" class="form-control" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                <input type="hidden" class="form-control" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" readonly />
                            </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if ($paket == 'Y') { ?>
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Paket Tarif</h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <form action="<?php echo site_url('m_tarif/insertpaket'); ?>" method="post">
                                <input type="hidden" class='autocomplete' id="kdtarif" name="kdtarif" value="<?php echo $this->uri->segment('3'); ?>" />
                                <input type="hidden" class='autocomplete' id="kdsubtarif" name="kdsubtarif" />
                                <input type="hidden" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" readonly />
                                <div class="form-group">
                                    <!-- <label class="form-label" for="button-addon5">Button on right</label> -->
                                    <div class="input-group">
                                        <input type="search" id=" autocomplete1" name="nama_customer" class="autocomplete form-control" placeholder="Masukkan nama tarif" aria-label="Recipient's username" aria-describedby="button-addon5">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary waves-effect waves-themed" type="submit" id="button-addon5"><i class="fal fa-save"></i> Add Paket</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Nama Tarif</th>
                                        <th>Tglinput</th>
                                        <th>Id Users</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($get_paket as $paket) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $paket->nmtarif ?></td>
                                            <td><?php echo tanggal($paket->tglinput) ?></td>
                                            <td><?php echo $paket->id_users ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/smartadmin/costume/jquery.autocomplete.js'></script>
<link href='<?php echo base_url(); ?>assets/smartadmin/costume/jquery.autocomplete.css' rel='stylesheet' />
<script type='text/javascript'>
    var site = "<?php echo site_url(); ?>";
    $(function() {
        $('.autocomplete').autocomplete({
            // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
            serviceUrl: site + 'm_tarif/searchtarif',
            // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
            onSelect: function(suggestion) {
                $('#kdsubtarif').val('' + suggestion.nim); // membuat id 'kdsubpaket' untuk ditampilkan
                //$('#v_jurusan').val('' + suggestion.jurusan); // membuat id 'v_jurusan' untuk ditampilkan
            }
        });
    });
</script>