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
                                            <td><b><?php echo ya($rujukan) ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 order-lg-3 order-xl-2">
            <div id="panel-10" class="panel">
                <div class="panel-hdr">
                    <h2>
                        REKAM MEDIS ELEKTRONIK <span class="fw-300"><i>(RME)</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#js_change_pill_justified-1">ASESSMENT DOKTER</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_change_pill_justified-2">TINDAKAN</a></li>
                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade active show" id="js_change_pill_justified-1" role="tabpanel">
                                <?php $this->load->view('t_daftar/soapdokter'); ?>
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_justified-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-block btn-info waves-effect waves-themed" data-toggle="modal" data-target=".modal-tindakan">Tindakan</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-block btn-success waves-effect waves-themed" data-toggle="modal" data-target=".modal-obat">Obat</button>
                                    </div>
                                </div>
                                <hr>
                                <div id="reload">
                                    <table class="table" id="">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0 table-scale-border-bottom">Nama Tindakan</th>
                                                <th class="text-right border-top-0 table-scale-border-bottom">Harga</th>
                                                <th class="text-center border-top-0 table-scale-border-bottom">Qty</th>
                                                <th class="text-right border-top-0 table-scale-border-bottom">Total</th>
                                                <th class="text-right border-top-0 table-scale-border-bottom"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5"><b>TINDAKAN</b></td>
                                            </tr>
                                        </tbody>
                                        <tbody id="show_data">

                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="5"><b>RESEP</b></td>
                                            </tr>
                                        </tbody>
                                        <tbody id="show_obat">
                                        </tbody>
                                    </table>
                                </div>
                                <!--MODAL HAPUS Tindakan-->
                                <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                                            </div>
                                            <form class="form-horizontal">
                                                <div class="modal-body">

                                                    <input type="hidden" name="idbill" id="textidbill" value="">
                                                    <div class="alert alert-warning">
                                                        <p>Apakah Anda yakin mau memhapus barang ini?</p>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--END MODAL HAPUS-->
                                <!--MODAL HAPUS Obat-->
                                <div class="modal fade" id="ModalHapusObat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Hapus Obat</h4>
                                            </div>
                                            <form class="form-horizontal">
                                                <div class="modal-body">

                                                    <input type="hidden" name="nobillobat" id="textnobillobat" value="">
                                                    <div class="alert alert-warning">
                                                        <p>Apakah Anda yakin mau memhapus barang ini?</p>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    <button class="btn_hapus_obat btn btn-danger" id="btn_hapus_obat">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--END MODAL HAPUS-->
                                <div class="modal fade modal-tindakan" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-right">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title h4">Master Tarif</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered table-hover table-striped w-100" id="tarif">
                                                    <thead>
                                                        <tr>
                                                            <th>Group Tarif</th>
                                                            <th>Nama Tarif</th>
                                                            <th>Harga</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($listtarif as $tarif) { ?>
                                                            <tr>
                                                                <td><b style="text-transform: uppercase;"><?php echo $tarif->poli ?></b></td>
                                                                <td><?php echo $tarif->nmtarif ?></td>
                                                                <td><?php echo number_format($tarif->harga) ?></td>
                                                                <td>
                                                                    <input type="hidden" name="noreg" id="noreg<?php echo $tarif->kdtarif ?>" value="<?php echo $noreg ?>">
                                                                    <button class="btn btn-info btn-xs" id="btn_simpan<?php echo $tarif->kdtarif ?>"><i class="fal fa-plus"></i></button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-themed">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal Obat -->
                                <div class="modal fade modal-obat" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-right">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title h4">Master Tarif Obat</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="display table table-bordered table-hover table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Obat</th>
                                                            <th>Harga</th>
                                                            <th>Stok</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($listobat as $obat) {
                                                            if ($obat->stok == 0) {
                                                                $hidden = ' disabled';
                                                            } else {
                                                                $hidden = '';
                                                            }
                                                        ?>
                                                            <tr>
                                                                <td><b style="text-transform: uppercase;"><?php echo $obat->obat ?></b></td>
                                                                <td>Rp. <?php echo number_format($obat->hargaobat) ?></td>
                                                                <td><?php echo number_format($obat->stok) ?></td>
                                                                <td>
                                                                    <input type="hidden" name="noreg" id="noreg<?php echo $obat->kdobat ?>" value="<?php echo $noreg ?>">
                                                                    <input type="hidden" name="user" id="user<?php echo $obat->kdobat ?>" value="<?php echo $this->session->userdata('id_users'); ?>">
                                                                    <button class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" <?php echo $hidden ?> id="btn_simpanobat<?php echo $obat->kdobat ?>"><i class="fal fa-plus"></i></button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-themed">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('t_daftar/asessment_perawat'); ?>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var groupColumn = 0;
        var table = $('#tarif').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "order": [
                [groupColumn, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                        );
                        last = group;
                    }
                });
            }
        });

        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                table.order([groupColumn, 'desc']).draw();
            } else {
                table.order([groupColumn, 'asc']).draw();
            }
        });
    });
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        tampil_data_barang(); //pemanggilan fungsi tampil barang.
        $('table.display').dataTable();
        //fungsi tampil barang
        function tampil_data_barang() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>index.php/t_daftar/data_barang/<?php echo $noreg ?>/<?php echo $kddokter ?>',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].nmtarif + '</td>' +
                            '<td align="right">' + parseInt(data[i].harga).toLocaleString() + '</td>' +
                            '<td align="center">' + data[i].qty + '</td>' +
                            '<td align="right">' + parseInt(data[i].harga * data[i].qty).toLocaleString() + '</td>' +
                            '<td style="text-align:center;">' +
                            '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].idbill + '"><i class="fal fa-trash"></i></a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
        //GET HAPUS
        $('#show_data').on('click', '.item_hapus', function() {
            var id = $(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="idbill"]').val(id);
        });

        //Simpan Barang
        <?php
        // $this->db->select('a.*,b.harga');
        // $this->db->from('m_tarif a');
        // $this->db->join('m_tarifkelas b', 'a.kdtarif = b.kdtarif and b.kdkelas=1', 'LEFT');
        // $query = $this->db->get();
        // foreach ($query->result() as $row) {
        foreach ($listtarif as $tarif) {
        ?>
            $('#btn_simpan<?php echo $tarif->kdtarif ?>').on('click', function() {
                var noreg = $('#noreg<?php echo $tarif->kdtarif ?>').val();
                var nobill = '<?php echo $nobill ?>';
                var paket = '<?php echo $tarif->paket ?>';
                var kdpoli = '<?php echo $kdpoli ?>';
                var kddokter = '<?php echo $kddokter ?>';
                var kdtarif = '<?php echo $tarif->kdtarif ?>';
                var harga = '<?php echo $tarif->harga ?>';
                var qty = '1';
                var kdbayar = '<?php echo $kdbayar ?>';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/t_daftar/simpan_barang') ?>",
                    dataType: "JSON",
                    data: {
                        noreg: noreg,
                        nobill: nobill,
                        kdpoli: kdpoli,
                        kddokter: kddokter,
                        paket: paket,
                        kdtarif: kdtarif,
                        harga: harga,
                        qty: qty,
                        kdbayar: kdbayar
                    },
                    success: function(data) {
                        $('#ModalaAdd').modal('hide');
                        tampil_data_barang();
                    }
                });
                return false;
            });
        <?php } ?>

        //Hapus Barang
        $('#btn_hapus').on('click', function() {
            var idbill = $('#textidbill').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('index.php/t_daftar/hapus_barang') ?>",
                dataType: "JSON",
                data: {
                    idbill: idbill
                },
                success: function(data) {
                    $('#ModalHapus').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
        /////////////////////////////////////////////////////////
        //tampil Obat
        tampil_obat(); //pemanggilan fungsi tampil barang.
        $('table.display').dataTable();
        //fungsi tampil barang
        function tampil_obat() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>index.php/t_daftar/obat_billing/<?php echo $noreg ?>/<?php echo $kddokter ?>',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].nmobat + '</td>' +
                            '<td align="right">' + parseInt(data[i].hargaobat).toLocaleString() + '</td>' +
                            '<td align="center">' + data[i].qty + '</td>' +
                            '<td align="right">' + parseInt(data[i].hargaobat * data[i].qty).toLocaleString() + '</td>' +
                            '<td style="text-align:center;">' +
                            '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_obat" data="' + data[i].nobill + '"><i class="fal fa-trash"></i></a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_obat').html(html);
                }
            });
        }

        //add paket tarif
        <?php foreach ($listobat as $obat) { ?>
            $('#btn_simpanobat<?php echo $obat->kdobat ?>').on('click', function() {
                var noreg = $('#noreg<?php echo $obat->kdobat ?>').val();
                var nobill = '<?php echo $nobill ?>';
                var user = $('#user<?php echo $this->session->userdata('id_users'); ?>').val();
                var kdpoli = '<?php echo $obat->kdpoli ?>';
                var kddokter = '<?php echo $kddokter ?>';
                var kdobat = '<?php echo $obat->kdobat ?>';
                var hargaobat = '<?php echo $obat->hargaobat ?>';
                var qty = '1';
                var kdbayar = '<?php echo $kdbayar ?>';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/t_daftar/simpan_obat') ?>",
                    dataType: "JSON",
                    data: {
                        noreg: noreg,
                        nobill: nobill,
                        kdpoli: kdpoli,
                        kddokter: kddokter,
                        user: user,
                        kdobat: kdobat,
                        hargaobat: hargaobat,
                        qty: qty,
                        kdbayar: kdbayar
                    },
                    success: function(data) {
                        tampil_obat();
                    }
                });
                return false;
            });
        <?php } ?>
        //GET HAPUS
        $('#show_obat').on('click', '.item_hapus_obat', function() {
            var id = $(this).attr('data');
            $('#ModalHapusObat').modal('show');
            $('[name="nobillobat"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus_obat').on('click', function() {
            var nobill = $('#textnobillobat').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('index.php/t_daftar/hapus_obat') ?>",
                dataType: "JSON",
                data: {
                    nobill: nobill
                },
                success: function(data) {
                    $('#ModalHapusObat').modal('hide');
                    tampil_obat();
                }
            });
            return false;
        });
    });
</script>