<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>M_tarifkelas Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Kdkelas</td><td><?php echo $kdkelas; ?></td></tr>
	    <tr><td>Kdtarif</td><td><?php echo $kdtarif; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Tglinput</td><td><?php echo $tglinput; ?></td></tr>
	    <tr><td>Id Users</td><td><?php echo $id_users; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('m_tarifkelas') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>