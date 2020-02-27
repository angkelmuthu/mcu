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
                                <?php $this->load->view('t_daftar/penunjang'); ?>
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_direction-4" role="tabpanel">
                                <div id="view" style="margin: 10px 20px;">
                                    <?php $this->load->view('t_daftar/soapdokter', array('get_icd' => $get_icd)); // Load file view.php dan kirim data siswanya
                                    ?>
                                </div>
                                <?php //$this->load->view('t_daftar/resume_medis');
                                ?>
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
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#icdmasuk").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icdakhir").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd101").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd102").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd103").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd104").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd105").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd91").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd92").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd93").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd94").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"
        });
        $("#icd95").autocomplete({
            source: "<?php echo site_url('t_daftar/get_icd10/?'); ?>"

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
<script>
    var base_url = '<?= base_url() ?>';
    var id = 0 // Untuk menampung ID yang kaan di ubah / hapus
    $(document).ready(function() {
        // Sembunyikan loading simpan, loading ubah, loading hapus, pesan error, pesan sukes, dan tombol reset
        $('#loading-simpan, #loading-hapus, #pesan-error, #pesan-sukses, #btn-reset').hide()
        // Fungsi ini akan dipanggil ketika tombol hapus diklik
        $('#view').on('click', '.btn-alert-hapus', function() { // Ketika tombol dengan class btn-alert-hapus pada div view di klik
            id = $(this).data('id') // Set variabel id dengan id yang kita set pada atribut data-id pada tag button hapus
        })
        $('#btn-tambah').click(function() { // Ketika tombol tambah diklik
            $('#btn-ubah').hide() // Sembunyikan tombol ubah
            $('#btn-simpan').show() // Munculkan tombol simpan
            // Set judul modal dialog menjadi Form Simpan Data
            $('#modal-title').html('Form Simpan data')
        })
        $('#btn-simpan').click(function() { // Ketika tombol simpan di klik
            $('#loading-simpan').show() // Munculkan loading simpan
            $.ajax({
                url: base_url + 't_daftar/simpan', // URL tujuan
                type: 'POST', // Tentukan type nya POST atau GET
                data: $("#form-modal form").serialize(), // Ambil semua data yang ada didalam tag form
                dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=UTF-8')
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $('#loading-simpan').hide() // Sembunyikan loading simpan
                    if (response.status == 'sukses') { // Jika Statusnya = sukses
                        // Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
                        $('#view').html(response.html)
                        /*
                         * Ambil pesan suksesnya dan set ke div pesan-sukses
                         * Lalu munculkan div pesan-sukes nya
                         * Setelah 10 detik, sembunyikan kembali pesan suksesnya
                         */
                        $('#pesan-sukses').html(response.pesan).fadeIn().delay(5).fadeOut()
                        $('#form-modal').modal('hide')
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        // Close / Tutup Modal Dialog
                    } else { // Jika statusnya = gagal
                        /*
                         * Ambil pesan errornya dan set ke div pesan-error
                         * Lalu munculkan div pesan-error nya
                         */
                        $('#pesan-error').html(response.pesan).show()
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                    alert(xhr.responseText) // munculkan alert
                }
            })
        })
        $('#btn-hapus').click(function() { // Ketika tombol hapus di klik
            $('#loading-hapus').show() // Munculkan loading hapus
            $.ajax({
                url: base_url + 't_daftar/hapus/' + id, // URL tujuan
                type: 'GET', // Tentukan type nya POST atau GET
                dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=UTF-8')
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $('#loading-hapus').hide() // Sembunyikan loading hapus
                    // Ganti isi dari div view dengan view yang diambil dari proses_hapus.php
                    $('#view').html(response.html)
                    /*
                     * Ambil pesan suksesnya dan set ke div pesan-sukses
                     * Lalu munculkan div pesan-sukes nya
                     * Setelah 10 detik, sembunyikan kembali pesan suksesnya
                     */
                    $('#pesan-sukses').html(response.pesan).fadeIn().delay(5).fadeOut()
                    $('#delete-modal').modal('hide')
                    $('.modal-backdrop').hide()
                    // Close / Tutup Modal Dialog
                }
            })
        })
        $('#form-modal').on('hidden.bs.modal', function(e) { // Ketika Modal Dialog di Close / tertutup
            $('#form-modal input, #form-modal select, #form-modal textarea').val('')
            // Clear inputan menjadi kosong
        })
    })
</script>