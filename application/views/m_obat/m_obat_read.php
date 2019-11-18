<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>M_obat Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Kdkatalog</td><td><?php echo $kdkatalog; ?></td></tr>
	    <tr><td>Kdfornas</td><td><?php echo $kdfornas; ?></td></tr>
	    <tr><td>Generik</td><td><?php echo $generik; ?></td></tr>
	    <tr><td>Nmobat</td><td><?php echo $nmobat; ?></td></tr>
	    <tr><td>Kdobatjenis</td><td><?php echo $kdobatjenis; ?></td></tr>
	    <tr><td>Dosis</td><td><?php echo $dosis; ?></td></tr>
	    <tr><td>Kdobatsatuan</td><td><?php echo $kdobatsatuan; ?></td></tr>
	    <tr><td>Kdobatcara</td><td><?php echo $kdobatcara; ?></td></tr>
	    <tr><td>Kdobatpakai</td><td><?php echo $kdobatpakai; ?></td></tr>
	    <tr><td>Hargaobat</td><td><?php echo $hargaobat; ?></td></tr>
	    <tr><td>Hashtag</td><td><?php echo $hashtag; ?></td></tr>
	    <tr><td>Tglinput</td><td><?php echo $tglinput; ?></td></tr>
	    <tr><td>Id Users</td><td><?php echo $id_users; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('m_obat') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>