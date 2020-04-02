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
                        <li class="completed"><a href="javascript:void(0);">5 keluarga</a></li>
                        <li class="active"><a href="javascript:void(0);">6 Verifikasi</a></li>
                    <?php else : ?>
                        <li class="completed"><a href="javascript:void(0);">5 keluarga</a></li>
                        <li class="active"><a href="javascript:void(0);">6 Asuransi</a></li>
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
                    <h2>FORM ASURANSI</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form method="POST" action="<?php echo site_url('pendaftaran/tujuh') ?>">
                            <input type="text" name="noreg" value="<?php echo $noreg ?>">
                            <!-- <input type="text" name="nobill" value="<?php echo $nobill ?>"> -->
                            <input type="text" name="nomr" value="<?php echo $nomr ?>">
                            <input type="text" name="baru" value="<?php echo $baru ?>">
                            <input type="text" name="unit" value="<?php echo $unit ?>">
                            <input type="text" name="kddokter" value="<?php echo $kddokter ?>">
                            <input type="text" name="kdpoli" value="<?php echo $kdpoli ?>">
                            <input type="text" name="kdbayar" value="<?php echo $kdbayar ?>">
                            <input type="text" name="rujukan" value="<?php echo $rujukan ?>">
                            <input type="text" name="kdrujuk" value="<?php echo $kdrujuk ?>">
                            <input type="text" name="tglreg" value="<?php echo $tglreg ?>">
                            <input type="text" name="id_users" value="<?php echo $id_users ?>">
                            <input type="text" name="nama" value="<?php echo $nama ?>">
                            <input type="text" name="alamat" value="<?php echo $alamat ?>">
                            <input type="text" name="hp" value="<?php echo $hp ?>">
                            <input type="text" name="kdhub" value="<?php echo $kdhub ?>">
                            <?php if ($kdbayar == 1) : ?>
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">No.BPJS / No. Rujukan</label>
                                    <input type="text" id="simpleinput" name="nama" class="form-control" required>
                                </div>
                            <?php else : ?>
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">No. Polish</label>
                                    <input type="text" id="simpleinput" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Kelas</label>
                                    <input type="text" id="simpleinput" name="alamat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Plafon</label>
                                    <input type="text" id="simpleinput" name="hp" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary">Simpan & Lanjutkan</button>
                                </div>
                        </form>
                    <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>