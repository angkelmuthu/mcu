<style>
    /* Custom Radio Button Start*/

    .radiotextsty {
        color: #A5A4BF;
        font-size: 18px;
    }

    .customradio {
        display: block;
        position: relative;
        padding-left: 30px;
        margin-bottom: 0px;
        cursor: pointer;
        font-size: 18px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .customradio input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 22px;
        width: 22px;
        background-color: white;
        border-radius: 50%;
        border: 1px solid #BEBEBE;
    }

    /* On mouse-over, add a grey background color */
    .customradio:hover input~.checkmark {
        background-color: transparent;
    }

    /* When the radio button is checked, add a blue background */
    .customradio input:checked~.checkmark {
        background-color: white;
        border: 1px solid #BEBEBE;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .customradio input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .customradio .checkmark:after {
        top: 2px;
        left: 2px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #A3A0FB;
    }

    /* Custom Radio Button End*/
</style>
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
                                                    <th class="text-center"></th>
                                                    <th class="text-center">#</th>
                                                    <th>Poli</th>
                                                    <th>Nama Tindakan</th>
                                                    <th>Dokter</th>
                                                    <th class="text-center">Pembayaran</th>
                                                    <th class="text-right">Unit Cost</th>
                                                    <th class="text-center">Qty</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <tr>
                                                    <td colspan="6"><b>TINDAKAN</b></td>
                                                </tr> -->
                                                <?php $no = 1;
                                                foreach ($billing as $bill) {
                                                    // if ($bill->resep == 'Y') {
                                                    //     echo '<tr><td colspan="6"><b>RESEP</b></td></tr>';
                                                    // }
                                                    if ($bill->kdmetodebayar == 1) {
                                                        $badge = 'success';
                                                    } elseif ($bill->kdmetodebayar == 2) {
                                                        $badge = 'primary';
                                                    } elseif ($bill->kdmetodebayar == 3) {
                                                        $badge = 'warning';
                                                    } elseif ($bill->kdmetodebayar == 4) {
                                                        $badge = 'secondary';
                                                    }
                                                    if ($bill->status == 'L') {
                                                        $modalbayar = $bill->bayar;
                                                        $trx = '<i class="fal fa-lock-alt"></i>';
                                                    } else {
                                                        $modalbayar = '<button type="button" class="btn btn-xs btn-' . $badge . '" data-toggle="modal" data-target=".carabayar-' . $bill->kode . ' ?>">' . $bill->bayar . '</button>';
                                                        $trx = '<i class="fal fa-lock-open-alt"></i>';
                                                    } ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $trx ?></td>
                                                        <td class="text-center"><?php echo $no ?></td>
                                                        <td><?php echo $bill->poli ?></td>
                                                        <td style="text-transform: uppercase;"><?php echo $bill->nama ?></td>
                                                        <td><?php echo $bill->dokter ?></td>
                                                        <!-- <td class="text-center"><span class="badge badge-<?php echo $badge ?>"><?php echo $bill->bayar ?></span></td> -->
                                                        <td class="text-center"><?php echo $modalbayar ?></td>
                                                        <td class="text-right"><?php echo angka($bill->harga) ?></td>
                                                        <td class="text-center"><?php echo angka($bill->qty) ?></td>
                                                        <td class="text-right" <?php //echo $coret
                                                                                ?>><?php echo angka($bill->harga * $bill->qty) ?></td>
                                                    </tr>
                                                    <!-- Modal Center Transparent -->
                                                    <div class="modal fade carabayar-<?php echo $bill->kode ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Merubah Cara Bayar</h4>
                                                                </div>
                                                                <form action="<?php echo site_url('billing/updatecrbayar'); ?>" method="post">
                                                                    <div class="modal-body">
                                                                        <input type="text" name="nobill" value="<?php echo $bill->nobill ?>">
                                                                        <input type="text" name="resep" value="<?php echo $bill->resep ?>">
                                                                        <input type="text" name="kode" value="<?php echo $bill->kode ?>">
                                                                        <input type="text" name="noreg" value="<?php echo $this->uri->segment('3'); ?>">
                                                                        <?php
                                                                        foreach ($get_carabayar as $cb) {
                                                                            echo '
                                                                        <label class="btn btn-info">
                                                                            <input type="radio" class="form-switch radio_1set" name="kdbayar" value="' . $cb->kdbayar . '" gl1=' . $cb->kdbayar . '" data-id="' . $cb->kdbayar . '">'  . $cb->bayar . '
                                                                        </label>';
                                                                        } ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php $no++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7 ml-sm-auto">
                                    <div class="panel-tag">
                                        Adding a hover effect adds nice element to your accordion. Achieve this by adding class <code>.accordion-hover</code> to <code>.accordion</code>
                                    </div>
                                </div>
                                <div class="col-sm-5 ml-sm-auto">
                                    <table class="table table-clean">
                                        <tbody>
                                            <?php foreach ($billing_total as $billtotal) { ?>
                                                <tr>
                                                    <td class="text-left">
                                                        <b><?php echo $billtotal->bayar ?> </b>
                                                    </td>
                                                    <td class="text-right">:</td>
                                                    <td class="text-right"><?php echo angka($billtotal->ttl) ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td class="text-left">
                                                    <b>Keringanan</b>
                                                </td>
                                                <td class="text-right"></td>
                                            </tr>
                                            <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">
                                                <td class="text-left keep-print-font"><b>Jumlah Bayar</b></td>
                                                <td class="text-right">:</td>
                                                <td class="text-right keep-print-font">
                                                    <h4 class="m-0 fw-700 h4 keep-print-font">
                                                        Rp. <?php foreach ($billing_bayar as $billbayar) {
                                                                echo angka($billbayar->ttl);
                                                            } ?></h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#default-example-modal">
                                        <span><i class="fal fa-money-bill"></i> <b>Pembayaran</b>
                                    </button>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#default-example-modal">
                                        <span><i class="fal fa-money-bill"></i> <b>Keringanan</b>
                                    </button>
                                    <button id="print" class="btn btn-info" type="button"> <span><i class="fal fa-print"></i> <b>Print</b></span> </button>
                                </div>
                                <!-- modal pembayaran -->
                                <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Pembayaran</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <form action="<?php echo site_url('billing/bayar'); ?>" method="post">
                                                <div class="modal-body">

                                                    <?php foreach ($billing_bayar as $billbayar) { ?>
                                                        <input type="hidden" name="nobill" value="<?php echo $billbayar->nobill; ?>">
                                                        <input type="hidden" name="noreg" value="<?php echo $billbayar->noreg; ?>">
                                                        <input type="hidden" name="jmlbayar" value="<?php echo $billbayar->ttl; ?>">
                                                        <input type="hidden" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                                        <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>">
                                                        <h1 class="text-center">Jumlah Yang Harus Dibayar<br>
                                                            <span class="badge badge-primary">Rp. <?php echo angka($billbayar->ttl); ?></span>
                                                        </h1>
                                                        <br>
                                                        <div class="alert border-warning bg-transparent fade show">
                                                            <div class="d-flex align-items-center">
                                                                <div class="alert-icon">
                                                                    <div class="alert-icon">
                                                                        <i class="fal fa-exclamation-triangle"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-1">
                                                                    <span class="h5">PERHATIAN!!</span>
                                                                    <br>
                                                                    Transaksi yang sudah dibayar tidak dapat dibatalkan tanpa persetujuan kepala installasi.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="btn btn-block btn-danger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            KERINGANAN
                                                        </a>
                                                        <div class="collapse" id="collapseExample">
                                                            <div class="card card-body">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="example-palaceholder">Jumlah Keringanan</label>
                                                                    <input type="text" id="example-palaceholder" class="form-control" placeholder="123456">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="example-textarea">Alasan</label>
                                                                    <textarea class="form-control" id="example-textarea" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Bayar/Lunas</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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