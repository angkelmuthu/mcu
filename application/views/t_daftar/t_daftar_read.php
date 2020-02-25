<main id="js-page-content" role="main" class="page-content">
    <div class="row">

        <div class="col-lg-12 col-xl-9 order-lg-3 order-xl-1">
            <div id="panel-9" class="panel">
                <div class="panel-hdr">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#js_change_pill_direction-1">TANDA VITAL</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_change_pill_direction-2">TINDAKAN</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_change_pill_direction-3">PENUNJANG</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_change_pill_direction-4">RESUME MEDIS</a></li>
                    </ul>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="js_change_pill_direction-1" role="tabpanel">
                                <?php $this->load->view('t_daftar/tanda_vital'); ?>
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_direction-2" role="tabpanel">
                                <?php $this->load->view('t_daftar/tindakan'); ?>
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_direction-3" role="tabpanel">
                                Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_direction-4" role="tabpanel">
                                <form action="" method="post">
                                    <div class="col-12">
                                        <input type="hidden" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                        <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">RIWAYAT ALERGI</label>
                                                    <input type="text" class="form-control" name="alergi"></input>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">DIET</label>
                                                    <input type="text" class="form-control" name="diet"></input>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">KELUHAN UTAMA</label>
                                                    <textarea class="form-control" name="subjek" id="example-textarea" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">RINGKASAN RIWAYAT PENYAKIT</label>
                                                    <textarea class="form-control" name="objek" id="example-textarea" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">PEMERIKSAAN FISIK</label>
                                                    <textarea class="form-control" name="asessment" id="example-textarea" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">PEMERIKSAAN PENUNJANG</label>
                                                    <textarea class="form-control" name="asessment" id="example-textarea" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">TERAPI DAN ATAU TINDAKAN</label>
                                                    <textarea class="form-control" name="plann" id="example-textarea" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                            </div>
                                            <div class="col-6 mb-2">
                                                <!-- <div class="form-group">
                    <label class="form-label" for="example-textarea">DIAGNOSA MASUK (ICD10)</label>
                    <textarea class="form-control" name="plann" id="example-textarea" rows="2"></textarea>
                </div> -->
                                                <form action="" method="post">
                                                    <input type="text" class='autocomplete' id="code" name="code" />
                                                    <input type="text" class='autocomplete' id="desc" name="desc" />
                                                    <input type="text" class='autocomplete' id="kdsubtarif" name="kdsubtarif" />
                                                    <input type="text" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                                    <input type="text" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" readonly />
                                                    <div class="form-group">
                                                        <!-- <label class="form-label" for="button-addon5">Button on right</label> -->
                                                        <div class="input-group">
                                                            <input type="search" id=" autocomplete1" name="nama_customer" class="autocomplete form-control" placeholder="cari berdasarkan icd10" aria-label="Recipient's username" aria-describedby="button-addon5">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary waves-effect waves-themed" type="submit" id="button-addon5"><i class="fal fa-save"></i> Add Paket</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                                                    <thead>
                                                        <tr>
                                                            <th width="30px">No</th>
                                                            <th>Nama Tarif</th>
                                                            <th>Tglinput</th>
                                                            <th>Id Users</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">DIAGNOSA AKHIR (ICD10)</label>
                                                    <textarea class="form-control" name="plann" id="example-textarea" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">TINDAKAN MEDIS (ICD9)</label>
                                                    <textarea class="form-control" name="plann" id="example-textarea" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                            </div>
                                        </div>

                                        <div class="p-3 text-center">
                                            <button type="submit" class="btn btn-sm btn-primary font-weight-bold">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-2">
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
        <?php //$this->load->view('t_daftar/asessment_perawat');
        ?>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/smartadmin/costume/jquery.autocomplete.js'></script>
<link href='<?php echo base_url(); ?>assets/smartadmin/costume/jquery.autocomplete.css' rel='stylesheet' />
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type='text/javascript'>
    var site = "<?php echo site_url(); ?>";
    $(function() {
        $('.autocomplete').autocomplete({
            // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
            serviceUrl: site + 't_daftar/get_icd10',
            // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
            onSelect: function(suggestion) {
                $('#kdsubtarif').val('' + suggestion.nim); // membuat id 'kdsubpaket' untuk ditampilkan
                //$('#v_jurusan').val('' + suggestion.jurusan); // membuat id 'v_jurusan' untuk ditampilkan
            }
        });
    });
</script>
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