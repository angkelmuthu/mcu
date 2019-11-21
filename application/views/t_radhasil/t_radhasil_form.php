<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA T_RADHASIL</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
            <form action="<?php echo $action; ?>" method="post">

<table class='table table-striped'>

	    <tr><td width='200'>Noreg <?php echo form_error('noreg') ?></td><td><input type="text" class="form-control" name="noreg" id="noreg" placeholder="Noreg" value="<?php echo $noreg; ?>" /></td></tr>
	    <tr><td width='200'>Kdtarif <?php echo form_error('kdtarif') ?></td><td><input type="text" class="form-control" name="kdtarif" id="kdtarif" placeholder="Kdtarif" value="<?php echo $kdtarif; ?>" /></td></tr>
	
        <tr><td width='200'>Hasil <?php echo form_error('hasil') ?></td><td> <textarea class="form-control" rows="3" name="hasil" id="hasil" placeholder="Hasil"><?php echo $hasil; ?></textarea></td></tr>
	    <tr><td width='200'>Tglinput <?php echo form_error('tglinput') ?></td><td><input type="text" class="form-control" name="tglinput" id="tglinput" placeholder="Tglinput" value="<?php echo $tglinput; ?>" /></td></tr>
	    <tr><td width='200'>Id Users <?php echo form_error('id_users') ?></td><td><input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="nobill" value="<?php echo $nobill; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_radhasil') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>