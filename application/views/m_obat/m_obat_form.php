<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA M_OBAT</h2>
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

	    <tr><td width='200'>Kdkatalog <?php echo form_error('kdkatalog') ?></td><td><input type="text" class="form-control" name="kdkatalog" id="kdkatalog" placeholder="Kdkatalog" value="<?php echo $kdkatalog; ?>" /></td></tr>
	    <tr><td width='200'>Kdfornas <?php echo form_error('kdfornas') ?></td><td><input type="text" class="form-control" name="kdfornas" id="kdfornas" placeholder="Kdfornas" value="<?php echo $kdfornas; ?>" /></td></tr>
	    <tr><td width='200'>Generik <?php echo form_error('generik') ?></td><td><input type="text" class="form-control" name="generik" id="generik" placeholder="Generik" value="<?php echo $generik; ?>" /></td></tr>
	    <tr><td width='200'>Nmobat <?php echo form_error('nmobat') ?></td><td><input type="text" class="form-control" name="nmobat" id="nmobat" placeholder="Nmobat" value="<?php echo $nmobat; ?>" /></td></tr>
	    <tr><td width='200'>Kdobatjenis <?php echo form_error('kdobatjenis') ?></td><td><input type="text" class="form-control" name="kdobatjenis" id="kdobatjenis" placeholder="Kdobatjenis" value="<?php echo $kdobatjenis; ?>" /></td></tr>
	    <tr><td width='200'>Dosis <?php echo form_error('dosis') ?></td><td><input type="text" class="form-control" name="dosis" id="dosis" placeholder="Dosis" value="<?php echo $dosis; ?>" /></td></tr>
	    <tr><td width='200'>Kdobatsatuan <?php echo form_error('kdobatsatuan') ?></td><td><input type="text" class="form-control" name="kdobatsatuan" id="kdobatsatuan" placeholder="Kdobatsatuan" value="<?php echo $kdobatsatuan; ?>" /></td></tr>
	    <tr><td width='200'>Kdobatcara <?php echo form_error('kdobatcara') ?></td><td><input type="text" class="form-control" name="kdobatcara" id="kdobatcara" placeholder="Kdobatcara" value="<?php echo $kdobatcara; ?>" /></td></tr>
	    <tr><td width='200'>Kdobatpakai <?php echo form_error('kdobatpakai') ?></td><td><input type="text" class="form-control" name="kdobatpakai" id="kdobatpakai" placeholder="Kdobatpakai" value="<?php echo $kdobatpakai; ?>" /></td></tr>
	    <tr><td width='200'>Hargaobat <?php echo form_error('hargaobat') ?></td><td><input type="text" class="form-control" name="hargaobat" id="hargaobat" placeholder="Hargaobat" value="<?php echo $hargaobat; ?>" /></td></tr>
	
        <tr><td width='200'>Hashtag <?php echo form_error('hashtag') ?></td><td> <textarea class="form-control" rows="3" name="hashtag" id="hashtag" placeholder="Hashtag"><?php echo $hashtag; ?></textarea></td></tr>
	    <tr><td width='200'>Tglinput <?php echo form_error('tglinput') ?></td><td><input type="text" class="form-control" name="tglinput" id="tglinput" placeholder="Tglinput" value="<?php echo $tglinput; ?>" /></td></tr>
	    <tr><td width='200'>Id Users <?php echo form_error('id_users') ?></td><td><input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="kdobat" value="<?php echo $kdobat; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_obat') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>