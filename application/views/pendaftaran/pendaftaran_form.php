<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA T_DAFTAR</h2>
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
	    <tr><td width='200'>Nobill <?php echo form_error('nobill') ?></td><td><input type="text" class="form-control" name="nobill" id="nobill" placeholder="Nobill" value="<?php echo $nobill; ?>" /></td></tr>
	    <tr><td width='200'>Nomr <?php echo form_error('nomr') ?></td><td><input type="text" class="form-control" name="nomr" id="nomr" placeholder="Nomr" value="<?php echo $nomr; ?>" /></td></tr>
	    <tr><td width='200'>Baru <?php echo form_error('baru') ?></td><td><input type="text" class="form-control" name="baru" id="baru" placeholder="Baru" value="<?php echo $baru; ?>" /></td></tr>
	    <tr><td width='200'>Kddokter <?php echo form_error('kddokter') ?></td><td><input type="text" class="form-control" name="kddokter" id="kddokter" placeholder="Kddokter" value="<?php echo $kddokter; ?>" /></td></tr>
	    <tr><td width='200'>Kdpoli <?php echo form_error('kdpoli') ?></td><td><input type="text" class="form-control" name="kdpoli" id="kdpoli" placeholder="Kdpoli" value="<?php echo $kdpoli; ?>" /></td></tr>
	    <tr><td width='200'>Kdbayar <?php echo form_error('kdbayar') ?></td><td><input type="text" class="form-control" name="kdbayar" id="kdbayar" placeholder="Kdbayar" value="<?php echo $kdbayar; ?>" /></td></tr>
	    <tr><td width='200'>Rujukan <?php echo form_error('rujukan') ?></td><td><input type="text" class="form-control" name="rujukan" id="rujukan" placeholder="Rujukan" value="<?php echo $rujukan; ?>" /></td></tr>
	    <tr><td width='200'>Kdrujuk <?php echo form_error('kdrujuk') ?></td><td><input type="text" class="form-control" name="kdrujuk" id="kdrujuk" placeholder="Kdrujuk" value="<?php echo $kdrujuk; ?>" /></td></tr>
	    <tr><td width='200'>Tglreg <?php echo form_error('tglreg') ?></td><td><input type="text" class="form-control" name="tglreg" id="tglreg" placeholder="Tglreg" value="<?php echo $tglreg; ?>" /></td></tr>
	    <tr><td width='200'>Id Users <?php echo form_error('id_users') ?></td><td><input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="idreg" value="<?php echo $idreg; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>