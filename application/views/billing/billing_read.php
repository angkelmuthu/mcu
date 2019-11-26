<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
            <!-- profile summary -->
            <div class="card mb-g rounded-top">
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <img src="<?php echo base_url() ?>assets/smartadmin/img/demo/avatars/avatar-admin-lg.png" class="rounded-circle shadow-2 img-thumbnail" alt="">
                            <h5 class="mb-0 fw-700 text-center mt-3" style="text-transform: uppercase;">
                                <?php echo $nama ?>
                                <!-- <small class="text-muted mb-0"><?php echo $nomr ?></small> -->
                            </h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-clean table-sm align-self-end">
                                    <tbody>
                                        <tr>
                                            <td>NOMR:</td>
                                            <td><b><?php echo $nomr ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>NIK:</td>
                                            <td><b><?php echo $nik ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin:</td>
                                            <td><b><?php echo $kelamin ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Status:</td>
                                            <td><b><?php echo $kawin ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Poli:</td>
                                            <td><b><?php echo $poli ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter:</td>
                                            <td><b><?php echo $dokter ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Pembayaran:</td>
                                            <td><b><?php echo $bayar ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Rujukan:</td>
                                            <td><b><?php echo $rujukan ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-9 order-lg-3 order-xl-2">
            <div id="panel-7" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Table <span class="fw-300"><i>Small</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="frame-wrap">
                            <table class="table m-0">
                                <thead class="bg-primary-500">
                                    <tr>
                                        <th width="3%">No.</th>
                                        <th>Nama Tindakan</th>
                                        <th class="text-right">Harga</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-right">Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6"><b>TINDAKAN</b></td>
                                    </tr>
                                    <?php $no = 1;
                                    foreach ($billing as $bill) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td style="text-transform: uppercase;"><?php echo $bill->nmtarif ?></td>
                                            <td class="text-right">Rp. <?php echo number_format($bill->harga) ?></td>
                                            <td class="text-center"><?php echo number_format($bill->qty) ?></td>
                                            <td class="text-right">Rp. <?php echo number_format($bill->harga * $bill->qty) ?></td>
                                            <td></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                    <tr>
                                        <td colspan="6"><b>PAKET TINDAKAN</b></td>
                                    </tr>
                                    <?php $no = 1;
                                    foreach ($billing_paket as $billpaket) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td style="text-transform: uppercase;"><?php echo $billpaket->nmpaket ?> | <?php echo $billpaket->nmtarif ?></td>
                                            <td class="text-right">Rp. <?php echo number_format($billpaket->harga) ?></td>
                                            <td class="text-center"><?php echo number_format($billpaket->qty) ?></td>
                                            <td class="text-right">Rp. <?php echo number_format($billpaket->harga * $billpaket->qty) ?></td>
                                            <td></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                    <tr>
                                        <td colspan="6"><b>RESEP</b></td>
                                    </tr>
                                    <?php $no = 1;
                                    foreach ($billing_obat as $billobat) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td style="text-transform: uppercase;"><?php echo $billobat->nmobat ?></td>
                                            <td class="text-right">Rp. <?php echo number_format($billobat->hargaobat) ?></td>
                                            <td class="text-center"><?php echo number_format($billobat->qty) ?></td>
                                            <td class="text-right">Rp. <?php echo number_format($billobat->hargaobat * $billobat->qty) ?></td>
                                            <td></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><b>Total</b></td>
                                        <td class="text-center">:</td>
                                        <td class="text-right"><b>Rp. 43242432</b></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><b>Potongan</b></td>
                                        <td class="text-center">:</td>
                                        <td class="text-right"><b>Rp. 43242432</b></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><b>Keringanan</b></td>
                                        <td class="text-center">:</td>
                                        <td class="text-right"><b>Rp. 43242432</b></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><b>Grand Total</b></td>
                                        <td class="text-center">:</td>
                                        <td class="text-right"><b>Rp. 43242432</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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