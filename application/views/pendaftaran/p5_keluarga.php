<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <ul class="breadcrumbx">
                <li class="completed"><a href="javascript:void(0);">1 Installasi</a></li>
                <li class="completed"><a href="javascript:void(0);">2 Data Pasien</a></li>
                <li class="completed"><a href="javascript:void(0);">3 Pembayaran</a></li>
                <li class="completed"><a href="javascript:void(0);">4 Poli / Kamar</a></li>
                <?php if ($unit == 'IGD' || $unit == 'RI') : ?>
                    <?php if ($kdbayar == 2) : ?>
                        <li class="active"><a href="javascript:void(0);">5 keluarga</a></li>
                        <li><a href="javascript:void(0);">6 Verifikasi</a></li>
                    <?php else : ?>
                        <li class="active"><a href="javascript:void(0);">5 keluarga</a></li>
                        <li><a href="javascript:void(0);">6 Asuransi</a></li>
                        <li><a href="javascript:void(0);">7 Verifikasi</a></li>
                    <?php endif; ?>
                <?php else : ?>
                    <li><a href="javascript:void(0);">5 Verifikasi</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>FORM DATA KELUARGA PASIEN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form method="POST" action="<?php echo site_url('pendaftaran/enam') ?>">
                            <input type="hidden" name="noreg" value="<?php echo $noreg ?>">
                            <!-- <input type="hidden" name="nobill" value="<?php echo $nobill ?>"> -->
                            <input type="hidden" name="nomr" value="<?php echo $nomr ?>">
                            <input type="hidden" name="baru" value="<?php echo $baru ?>">
                            <input type="hidden" name="unit" value="<?php echo $unit ?>">
                            <input type="hidden" name="kddokter" value="<?php echo $kddokter ?>">
                            <input type="hidden" name="kdpoli" value="<?php echo $kdpoli ?>">
                            <input type="hidden" name="kdbayar" value="<?php echo $kdbayar ?>">
                            <input type="hidden" name="rujukan" value="<?php echo $rujukan ?>">
                            <input type="hidden" name="kdrujuk" value="<?php echo $kdrujuk ?>">
                            <input type="hidden" name="tglreg" value="<?php echo $tglreg ?>">
                            <input type="hidden" name="id_users" value="<?php echo $id_users ?>">

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Nama</label>
                                <input type="text" id="simpleinput" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Alamat</label>
                                <input type="text" id="simpleinput" name="alamat" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">No. Tlp / HP</label>
                                <input type="text" id="simpleinput" name="hp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="example-select">Hubungan dg Pasien</label>
                                <select class="form-control" id="example-select" name="kdhub" required>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Simpan & Lanjutkan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>