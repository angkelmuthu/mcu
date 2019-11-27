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
                                <table class="table table-sm align-self-end">
                                    <tbody>
                                        <tr>
                                            <td>NOMR</td>
                                            <td><b><?php echo $nomr ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td><b><?php echo $nik ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><b><?php echo $kelamin ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td><b><?php echo $kawin ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Poli</td>
                                            <td><b><?php echo $poli ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter</td>
                                            <td><b><?php echo $dokter ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Pembayaran</td>
                                            <td><b><?php echo $bayar ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Rujukan</td>
                                            <td><b><?php echo $rujukan ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-block btn-warning" type="button"> <span><i class="fal fa-clone"></i> <b>Split Pembayaran</b></span> </button>
                                <button class="btn btn-block btn-success" type="button"> <span><i class="fal fa-money-bill"></i> <b>Pembayaran</b></span> </button>
                                <button id="print" class="btn btn-block btn-info" type="button"> <span><i class="fal fa-print"></i> <b>Print</b></span> </button>
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
                        Billing <span class="fw-300"><i>#<?php echo $noreg ?></i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="frame-wrap printableArea">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table mt-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center border-top-0 table-scale-border-bottom fw-700"></th>
                                                    <th class="border-top-0 table-scale-border-bottom fw-700">Nama Tindakan</th>
                                                    <th class="text-center border-top-0 table-scale-border-bottom fw-700">Pembayaran</th>
                                                    <th class="text-right border-top-0 table-scale-border-bottom fw-700">Unit Cost</th>
                                                    <th class="text-center border-top-0 table-scale-border-bottom fw-700">Qty</th>
                                                    <th class="text-right border-top-0 table-scale-border-bottom fw-700">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6"><b>TINDAKAN</b></td>
                                                </tr>
                                                <?php $no = 1;
                                                foreach ($billing as $bill) {
                                                    if ($bill->kdmetodebayar == 1) {
                                                        $badge = 'success';
                                                        $coret = ' style="text-decoration: line-through;"';
                                                    } elseif ($bill->kdmetodebayar == 2) {
                                                        $badge = 'primary';
                                                        $coret = '';
                                                    } elseif ($bill->kdmetodebayar == 3) {
                                                        $badge = 'warning';
                                                        $coret = ' style="text-decoration: line-through;"';
                                                    } elseif ($bill->kdmetodebayar == 4) {
                                                        $badge = 'secondary';
                                                        $coret = ' style="text-decoration: line-through;"';
                                                    } ?>
                                                    <tr>
                                                        <td class="text-center fw-700"><?php echo $no ?></td>
                                                        <td style="text-transform: uppercase;"><?php echo $bill->nmtarif ?></td>
                                                        <td class="text-center"><span class="badge badge-<?php echo $badge ?>"><?php echo $bill->bayar ?></span></td>
                                                        <td class="text-right">Rp. <?php echo number_format($bill->harga) ?></td>
                                                        <td class="text-center"><?php echo number_format($bill->qty) ?></td>
                                                        <td class="text-right" <?php echo $coret ?>>Rp. <?php echo number_format($bill->harga * $bill->qty) ?></td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                                <tr>
                                                    <td colspan="6"><b>PAKET TINDAKAN</b></td>
                                                </tr>
                                                <?php $no = 1;
                                                foreach ($billing_paket as $billpaket) {
                                                    if ($billpaket->kdmetodebayar == 1) {
                                                        $badge = 'success';
                                                        $coret = ' style="text-decoration: line-through;"';
                                                    } elseif ($billpaket->kdmetodebayar == 2) {
                                                        $badge = 'primary';
                                                        $coret = '';
                                                    } elseif ($billpaket->kdmetodebayar == 3) {
                                                        $badge = 'warning';
                                                        $coret = ' style="text-decoration: line-through;"';
                                                    } elseif ($billpaket->kdmetodebayar == 4) {
                                                        $badge = 'secondary';
                                                        $coret = ' style="text-decoration: line-through;"';
                                                    } ?>
                                                    <tr>
                                                        <td class="text-center fw-700"><?php echo $no ?></td>
                                                        <td class="text-left strong" style="text-transform: uppercase;"><?php echo $billpaket->nmpaket ?> | <?php echo $billpaket->nmtarif ?></td>
                                                        <td class="text-center"><span class="badge badge-<?php echo $badge ?>"><?php echo $billpaket->bayar ?></span></td>
                                                        <td class="text-right">Rp. <?php echo number_format($billpaket->harga) ?></td>
                                                        <td class="text-center"><?php echo number_format($billpaket->qty) ?></td>
                                                        <td class="text-right" <?php echo $coret ?>>Rp. <?php echo number_format($billpaket->harga * $billpaket->qty) ?></td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                                <tr>
                                                    <td colspan="6"><b>RESEP</b></td>
                                                </tr>
                                                <?php $no = 1;
                                                foreach ($billing_obat as $billobat) {
                                                    if ($billobat->kdmetodebayar == 1) {
                                                        $badge = 'success';
                                                        $coret = ' style="text-decoration: line-through;"';
                                                    } elseif ($billobat->kdmetodebayar == 2) {
                                                        $badge = 'primary';
                                                        $coret = '';
                                                    } elseif ($billobat->kdmetodebayar == 3) {
                                                        $badge = 'warning';
                                                        $coret = ' style="text-decoration: line-through;"';
                                                    } elseif ($billobat->kdmetodebayar == 4) {
                                                        $badge = 'secondary';
                                                        $coret = ' style="text-decoration: line-through;"';
                                                    } ?>
                                                    <tr>
                                                        <td class="text-center fw-700"><?php echo $no ?></td>
                                                        <td style="text-transform: uppercase;"><?php echo $billobat->nmobat ?></td>
                                                        <td class="text-center"><span class="badge badge-<?php echo $badge ?>"><?php echo $billobat->bayar ?></span></td>
                                                        <td class="text-right">Rp. <?php echo number_format($billobat->hargaobat) ?></td>
                                                        <td class="text-center"><?php echo number_format($billobat->qty) ?></td>
                                                        <td class="text-right" <?php echo $coret ?>>Rp. <?php echo number_format($billobat->hargaobat * $billobat->qty) ?></td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 ml-sm-auto">
                                    <table class="table table-clean">
                                        <tbody>
                                            <tr>
                                                <td class="text-left">
                                                    <strong>Subtotal</strong>
                                                </td>
                                                <td class="text-right">Rp. <?php echo number_format($bill_total + $bill_paket_total + $bill_obat_total) ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    <strong>Discount (20%)</strong>
                                                </td>
                                                <td class="text-right">$1,699.40</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    <strong>VAT (10%)</strong>
                                                </td>
                                                <td class="text-right">$679.76</td>
                                            </tr>
                                            <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">
                                                <td class="text-left keep-print-font">
                                                    <h4 class="m-0 fw-700 h2 keep-print-font color-primary-700">Total</h4>
                                                </td>
                                                <td class="text-right keep-print-font">
                                                    <h4 class="m-0 fw-700 h2 keep-print-font">$7,477.36</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
<script src="<?php echo base_url('assets/smartadmin/js/jquery.PrintArea.js') ?>" type="text/JavaScript"></script>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
</script>
<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>