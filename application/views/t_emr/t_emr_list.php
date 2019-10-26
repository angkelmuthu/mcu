<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA T_EMR</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_emr/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?></div>
                        <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                            <thead>
                                <tr>
                                    <th>Noreg</th>
                                    <th>NOMR</th>
                                    <th>Nama Pasien</th>
                                    <th>Tgl Lahir</th>
                                    <th>Pasien Baru</th>
                                    <th>Dokter</th>
                                    <th>Poli</th>
                                    <th>Tglinput</th>
                                    <th>Id Users</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody><?php
                                    $sql_t_asessment = "SELECT a.noreg,a.nomr,b.nama,b.tgllhr,a.baru,a.kddokter,a.kdpoli ,c.tglinput,c.id_users FROM t_daftar a
                                        LEFT JOIN m_pasien b ON a.nomr=b.nomr
                                        LEFT JOIN t_emr c ON a.noreg=c.noreg";
                                    $t_asessment_data = $this->db->query($sql_t_asessment)->result();
                                    foreach ($t_asessment_data as $t_asessment) {
                                        ?>
                                    <tr>
                                        <td><?php echo $t_asessment->noreg ?></td>
                                        <td><?php echo $t_asessment->nomr ?></td>
                                        <td><?php echo $t_asessment->nama ?></td>
                                        <td><?php echo $t_asessment->tgllhr ?></td>
                                        <td><?php echo $t_asessment->baru ?></td>
                                        <td><?php echo $t_asessment->kddokter ?></td>
                                        <td><?php echo $t_asessment->kdpoli ?></td>
                                        <td><?php echo $t_asessment->tglinput ?></td>
                                        <td><?php echo $t_asessment->id_users ?></td>
                                        <td>
                                            <?php
                                                if (is_null($t_asessment->id_users)) {
                                                    echo anchor(site_url('t_emr/create/' . $t_asessment->noreg), '<i class="fal fa-plus-square" aria-hidden="true"></i> EMR', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
                                                } else {
                                                    echo
                                                        anchor(site_url('t_emr/read/' . $t_asessment->noreg), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed'));
                                                    echo
                                                        anchor(site_url('t_emr/update/' . $t_asessment->noreg), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed'));
                                                }
                                                ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dt-basic-example').DataTable();
    });
</script>