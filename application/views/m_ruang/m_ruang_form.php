<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA M_RUANG</h2>
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

                                <tr>
                                    <td width='200'>Ruang <?php echo form_error('ruang') ?></td>
                                    <td><input type="text" class="form-control" name="ruang" id="ruang" placeholder="Ruang" value="<?php echo $ruang; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdunit <?php echo form_error('kdunit') ?></td>
                                    <td><?php
                                        $this->db->from('m_unit');
                                        $this->db->where('inap', 'Y');
                                        $units = $this->db->get()->result();
                                        foreach ($units as $unit) : ?>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="kdunit" id="kdunit" value="<?php echo $unit->kdunit; ?>"><?php echo $unit->unit; ?>
                                            </label>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Iskelas <?php echo form_error('iskelas') ?></td>
                                    <td><input type="text" class="form-control" name="iskelas" id="iskelas" placeholder="Iskelas" value="<?php echo $iskelas; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdkelas <?php echo form_error('kdkelas') ?></td>
                                    <td><?php echo cmb_dinamis('kdkelas', 'm_kelas', 'kelas', 'kdkelas') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga <?php echo form_error('harga') ?></td>
                                    <td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Aktif <?php echo form_error('aktif') ?></td>
                                    <td><input type="text" class="form-control" name="aktif" id="aktif" placeholder="Aktif" value="<?php echo $aktif; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="kdruang" value="<?php echo $kdruang; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_ruang') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>