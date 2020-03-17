<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA t_vital</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php //echo anchor(site_url('t_vital/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
                            ?></div>
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
                                    $sql_t_vital = "SELECT a.noreg,a.nomr,a.nama,a.tgllhr,a.baru,a.dokter,a.poli,b.tglinput,b.id_users FROM v_pendaftaran a
                                        LEFT JOIN t_vital b ON a.noreg=b.noreg";
                                    $t_vital_data = $this->db->query($sql_t_vital)->result();
                                    foreach ($t_vital_data as $t_vital) {
                                        ?>
                                    <tr>
                                        <td><?php echo $t_vital->noreg ?></td>
                                        <td><?php echo $t_vital->nomr ?></td>
                                        <td><?php echo $t_vital->nama ?></td>
                                        <td><?php echo tanggal($t_vital->tgllhr) ?></td>
                                        <td><?php echo $t_vital->baru ?></td>
                                        <td><?php echo $t_vital->dokter ?></td>
                                        <td><?php echo $t_vital->poli ?></td>
                                        <td><?php echo $t_vital->tglinput ?></td>
                                        <td><?php echo $t_vital->id_users ?></td>
                                        <td>
                                            <?php
                                                if (is_null($t_vital->id_users)) {
                                                    echo anchor(site_url('t_vital/create/' . $t_vital->noreg . '/' . $t_vital->nomr), '<i class="fal fa-plus-square" aria-hidden="true"></i> Asessment', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
                                                } else {
                                                    echo
                                                        anchor(site_url('t_vital/read/' . $t_vital->noreg . '/' . $t_vital->nomr), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed'));
                                                    echo
                                                        anchor(site_url('t_vital/update/' . $t_vital->noreg . '/' . $t_vital->nomr), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed'));
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