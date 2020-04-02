<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <ul class="breadcrumbx">
                <li class="completed"><a href="#" onclick="window.history.go(-4);">1 - Installasi</a></li>
                <li class="completed"><a href="#" onclick="window.history.go(-3);">2 - Data Pasien</a></li>
                <li class="completed"><a href="#" onclick="window.history.go(-2);">3 - Metode Pembayaran</a></li>
                <li class="completed"><a href="#" onclick="window.history.go(-1);">4 - Administrasi</a></li>
                <li class="active"><a href="#">5 - Konfirmasi</a></li>
            </ul>
        </div>
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>FORM PENDAFTARAN PASIEN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <?php echo $nomr ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>