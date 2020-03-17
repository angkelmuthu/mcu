<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA T_LABHASIL</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_labhasil/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?></div>
                        <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                            <thead>
                                <tr>
                                    <th>No. Reg</th>
                                    <th>Nama</th>
                                    <th>Tgl Lahir</th>
                                    <th>Alamat</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_lab = "SELECT a.nobill,a.noreg,f.nama,f.tgllhr,f.alamat FROM t_billrajal a
                                LEFT JOIN m_tarif d ON a.kdtarif=d.kdtarif
                                LEFT JOIN t_daftar e ON a.noreg=e.noreg
                                LEFT JOIN m_pasien f ON e.nomr=f.nomr
                                WHERE d.kdpoli=4
                                GROUP BY a.noreg";
                                $data = $this->db->query($sql_lab)->result();
                                foreach ($data as $lab) { ?>
                                    <tr>
                                        <td><?php echo $lab->noreg ?></td>
                                        <td><b style="text-transform: uppercase;"><?php echo $lab->nama ?></b></td>
                                        <td><?php echo $lab->tgllhr ?></td>
                                        <td><?php echo $lab->alamat ?></td>
                                        <td>
                                            <a href="t_radhasil/read/<?php echo $lab->noreg ?>/<?php echo $lab->nobill ?>" class="btn btn-info btn-xs"><i class="fal fa-eye"></i></a>
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