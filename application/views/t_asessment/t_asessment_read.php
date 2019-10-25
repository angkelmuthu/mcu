<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>T_asessment Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Bb</td><td><?php echo $bb; ?></td></tr>
	    <tr><td>Tb</td><td><?php echo $tb; ?></td></tr>
	    <tr><td>Sb</td><td><?php echo $sb; ?></td></tr>
	    <tr><td>Sistole</td><td><?php echo $sistole; ?></td></tr>
	    <tr><td>Diastole</td><td><?php echo $diastole; ?></td></tr>
	    <tr><td>Nadi</td><td><?php echo $nadi; ?></td></tr>
	    <tr><td>Napas</td><td><?php echo $napas; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Tglinput</td><td><?php echo $tglinput; ?></td></tr>
	    <tr><td>Id Users</td><td><?php echo $id_users; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_asessment') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>