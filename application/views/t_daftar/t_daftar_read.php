<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
            <!-- profile summary -->
            <div class="card mb-g rounded-top">
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <img src="<?php echo base_url() ?>assets/smartadmin/img/demo/avatars/avatar-admin-lg.png" class="rounded-circle shadow-2 img-thumbnail" alt="">
                            <h5 class="mb-0 fw-700 text-center mt-3">
                                <?php echo $nama ?>
                                <!-- <small class="text-muted mb-0"><?php echo $nomr ?></small> -->
                            </h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-clean table-sm align-self-end">
                                    <tbody>
                                        <tr>
                                            <td>NOMR:</td>
                                            <td><?php echo $nomr ?></td>
                                        </tr>
                                        <tr>
                                            <td>NIK:</td>
                                            <td><?php echo $nik ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pembayaran:</td>
                                            <td><?php echo $kdbayar ?></td>
                                        </tr>
                                        <tr>
                                            <td>Rujukan:</td>
                                            <td><?php echo $rujukan ?></td>
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
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_change_pill_justified-3">RESEP</a></li>
                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade active show" id="js_change_pill_justified-1" role="tabpanel">
                                <?php $this->load->view('t_daftar/soapdokter'); ?>
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_justified-2" role="tabpanel">
                                <button type="button" class="btn btn-sm btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".modal-tindakan">Tindakan</button>
                                <button type="button" class="btn btn-sm btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".modal-paket">Tindakan Paket</button>
                                <hr>
                                <div id="reload">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <!--<th class="border-top-0 table-scale-border-bottom fw-700">Group Tarif</th>-->
                                                    <th class="border-top-0 table-scale-border-bottom fw-700">Nama Tarif</th>
                                                    <th class="text-right border-top-0 table-scale-border-bottom fw-700">Harga</th>
                                                    <th class="text-center border-top-0 table-scale-border-bottom fw-700">Qty</th>
                                                    <th class="text-right border-top-0 table-scale-border-bottom fw-700">Total</th>
                                                    <th class="text-right border-top-0 table-scale-border-bottom fw-700"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="show_data">

                                            </tbody>
                                        </table>
                                    </div>
                                    <table class="table" id="">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0 table-scale-border-bottom fw-700">Nama Paket</th>
                                                <th class="text-right border-top-0 table-scale-border-bottom fw-700">Harga</th>
                                                <th class="text-center border-top-0 table-scale-border-bottom fw-700">Qty</th>
                                                <th class="text-center border-top-0 table-scale-border-bottom fw-700">Potongan</th>
                                                <th class="text-right border-top-0 table-scale-border-bottom fw-700">Total</th>
                                                <th class="text-right border-top-0 table-scale-border-bottom fw-700"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_paket">

                                        </tbody>
                                    </table>
                                </div>
                                <!--MODAL HAPUS-->
                                <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                                            </div>
                                            <form class="form-horizontal">
                                                <div class="modal-body">

                                                    <input type="hidden" name="nobill" id="textnobill" value="">
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
                                                        <?php foreach ($tarifgroup as $tgroup) { ?>
                                                            <tr>
                                                                <td><b style="text-transform: uppercase;"><?php echo $tgroup->tarifgroup ?></b></td>
                                                                <td><?php echo $tgroup->nmtarif ?></td>
                                                                <td><?php echo number_format($tgroup->harga) ?></td>
                                                                <td>
                                                                    <input type="hidden" name="noreg" id="noreg<?php echo $tgroup->kdtarif ?>" value="<?php echo $noreg ?>">
                                                                    <button class="btn btn-info btn-xs" id="btn_simpan<?php echo $tgroup->kdtarif ?>">add</button>
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
                                <!-- modal paket -->
                                <div class="modal fade modal-paket" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
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
                                                            <th>Paket Tarif</th>
                                                            <!-- <th>Nama Tarif</th> -->
                                                            <th>Harga Paket</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($tarifpaket as $tpaket) { ?>
                                                            <tr>
                                                                <td><b style="text-transform: uppercase;"><?php echo $tpaket->nmpaket ?></b></td>
                                                                <!-- <td><?php echo $tpaket->nmtarif ?></td> -->
                                                                <td><?php echo number_format($tpaket->harga) ?></td>
                                                                <td>
                                                                    <input type="text" name="noreg" id="noreg<?php echo $tpaket->kdtarifpaket ?>" value="<?php echo $noreg ?>">
                                                                    <button class="btn btn-info btn-xs" id="btn_simpanpaket<?php echo $tpaket->kdtarifpaket ?>">add</button>
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
                            <div class="tab-pane fade" id="js_change_pill_justified-3" role="tabpanel">

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
        $('table.display').DataTable({
            "paging": false,
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4],
                "orderable": false
            }]
        });
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
                url: '<?php echo base_url() ?>index.php/t_daftar/data_barang',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            //'<td>' + data[i].tarifgroup + '</td>' +
                            '<td>' + data[i].nmtarif + '</td>' +
                            '<td align="right">' + parseInt(data[i].harga).toLocaleString() + '</td>' +
                            '<td align="center">' + data[i].qty + '</td>' +
                            '<td align="right">' + parseInt(data[i].harga * data[i].qty).toLocaleString() + '</td>' +
                            '<td style="text-align:center;">' +
                            //'<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].kdtarif + '">Edit</a>' + ' ' +
                            '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].nobill + '">Hapus</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
        //GET UPDATE
        $('#show_data').on('click', '.item_edit', function() {
            var id = $(this).attr('data');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('index.php/barang/get_barang') ?>",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    $.each(data, function(barang_kode, barang_nama, barang_harga) {
                        $('#ModalaEdit').modal('show');
                        $('[name="kobar_edit"]').val(data.barang_kode);
                        $('[name="nabar_edit"]').val(data.barang_nama);
                        $('[name="harga_edit"]').val(data.barang_harga);
                    });
                }
            });
            return false;
        });
        //GET HAPUS
        $('#show_data').on('click', '.item_hapus', function() {
            var id = $(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="nobill"]').val(id);
        });

        //Simpan Barang
        <?php
        $this->db->select('*');
        $this->db->from('m_tarif');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            ?>
            $('#btn_simpan<?php echo $row->kdtarif ?>').on('click', function() {
                var noreg = $('#noreg<?php echo $row->kdtarif ?>').val();
                var paket = 'N';
                var kdpaket = '0';
                var kdtarif = '<?php echo $row->kdtarif ?>';
                var qty = '1';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/t_daftar/simpan_barang') ?>",
                    dataType: "JSON",
                    data: {
                        noreg: noreg,
                        paket: paket,
                        kdpaket: kdpaket,
                        kdtarif: kdtarif,
                        qty: qty
                    },
                    success: function(data) {
                        $('[name="kobar"]').val("");
                        $('[name="nabar"]').val("");
                        $('[name="harga"]').val("");
                        $('#ModalaAdd').modal('hide');
                        tampil_data_barang();
                    }
                });
                return false;
            });
        <?php } ?>
        //Update Barang
        $('#btn_update').on('click', function() {
            var kobar = $('#kode_barang2').val();
            var nabar = $('#nama_barang2').val();
            var harga = $('#harga2').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('index.php/barang/update_barang') ?>",
                dataType: "JSON",
                data: {
                    kobar: kobar,
                    nabar: nabar,
                    harga: harga
                },
                success: function(data) {
                    $('[name="kobar_edit"]').val("");
                    $('[name="nabar_edit"]').val("");
                    $('[name="harga_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });

        //Hapus Barang
        $('#btn_hapus').on('click', function() {
            var nobill = $('#textnobill').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('index.php/t_daftar/hapus_barang') ?>",
                dataType: "JSON",
                data: {
                    nobill: nobill
                },
                success: function(data) {
                    $('#ModalHapus').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });

        /////////////////////////////////////////////////////////
        //tampil paket tarif
        tampil_paket_tarif(); //pemanggilan fungsi tampil barang.
        $('table.display').dataTable();
        //fungsi tampil barang
        function tampil_paket_tarif() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>index.php/t_daftar/paket_billing',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].nmpaket + '</td>' +
                            '<td align="right">' + parseInt(data[i].harga).toLocaleString() + '</td>' +
                            '<td align="center">' + data[i].qty + '</td>' +
                            '<td align="center">' + parseInt(data[i].potongan * data[i].qty).toLocaleString() + '</td>' +
                            '<td align="right">' + parseInt((data[i].harga * data[i].qty) - data[i].potongan * data[i].qty).toLocaleString() + '</td>' +
                            '<td style="text-align:center;">' +
                            '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].nobill + '">Hapus</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_paket').html(html);
                }
            });
        }
        //add paket tarif
        <?php
        foreach ($tarifpaket as $row) {
            ?>
            $('#btn_simpanpaket<?php echo $row->kdtarifpaket ?>').on('click', function() {
                var noreg = $('#noreg<?php echo $row->kdtarifpaket ?>').val();
                var paket = 'Y';
                var kdpaket = '<?php echo $row->kdtarifpaket ?>';
                var kdtarif = '0';
                var qty = '1';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/t_daftar/simpan_barang') ?>",
                    dataType: "JSON",
                    data: {
                        noreg: noreg,
                        paket: paket,
                        kdpaket: kdpaket,
                        kdtarif: kdtarif,
                        qty: qty
                    },
                    success: function(data) {
                        $('[name="kobar"]').val("");
                        $('[name="nabar"]').val("");
                        $('[name="harga"]').val("");
                        $('#ModalaAdd').modal('hide');
                        tampil_paket_tarif();
                    }
                });
                return false;
            });
        <?php } ?>

    });
</script>