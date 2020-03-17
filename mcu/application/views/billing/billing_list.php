<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA T_DAFTAR</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="display table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>NoReg</th>
                                    <th>Nomr</th>
                                    <th>Nama</th>
                                    <th>TGL Lahir</th>
                                    <th>Baru</th>
                                    <th>dokter</th>
                                    <th>poli</th>
                                    <th>bayar</th>
                                    <th>Tglreg</th>
                                    <th>Users</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($billing as $bill) { ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $bill->noreg ?></td>
                                        <td><?php echo $bill->nomr ?></td>
                                        <td><?php echo $bill->nama ?></td>
                                        <td><?php echo $bill->tgllhr ?></td>
                                        <td><?php echo $bill->baru ?></td>
                                        <td><?php echo $bill->dokter ?></td>
                                        <td><?php echo $bill->poli ?></td>
                                        <td><?php echo $bill->bayar ?></td>
                                        <td><?php echo $bill->tglreg ?></td>
                                        <td><?php echo $bill->petugas ?></td>
                                        <td><a href="billing/read/<?php echo $bill->noreg ?>" class="btn btn-sm btn-primary"> <i class="fal fa-eye" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php $no++;
                                } ?>
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
        $('table.display').DataTable();
    });
</script>