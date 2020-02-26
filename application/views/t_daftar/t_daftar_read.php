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
                                <?php
                                $this->db->from('v_penunjang');
                                $this->db->where('noreg', $noreg);
                                $this->db->group_by('kdpoli');
                                $query = $this->db->get();
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $row) {
                                        echo '<h2 class="fw-700 mt-2 mb-2"><i class="subheader-icon fal fa-list-alt"></i> ' . $row->poli . '</h2>';
                                        ///echo '<h3>' . $row->poli . '</h3>';
                                        $this->db->from('v_penunjang');
                                        $this->db->where('kdpoli', $row->kdpoli);
                                        $query2 = $this->db->get()->result();
                                        foreach ($query2 as $row2) {
                                            ?>
                                            <table class="table table-hover">
                                                <thead class="bg-info-500">
                                                    <th>Nama Pemeriksaan : <?php echo $row2->nmtarif ?></th>
                                                </thead>
                                            </table>

                                            <?php
                                                        if ($row->kdpoli == 5) { ?>
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Jenis Pemeriksaan</th>
                                                            <th>Deskripsi</th>
                                                            <th>Ambang Nilai</th>
                                                            <th>Hasil Nilai</th>
                                                            <th>Hasil</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                        $this->db->select('a.noreg,d.*,e.nobill as labbill,e.nilai');
                                                                        $this->db->from('t_billrajal a');
                                                                        $this->db->JOIN('m_tarif b', 'a.kdtarif=b.kdtarif', 'LEFT');
                                                                        $this->db->JOIN('m_labgroup c', 'b.kdtarif=c.kdtarif', 'LEFT');
                                                                        $this->db->JOIN('m_lab d', 'c.kdlab=d.kdlab', 'LEFT');
                                                                        $this->db->JOIN('t_labhasil e', 'e.kdlab=d.kdlab', 'LEFT');
                                                                        $this->db->where('a.noreg', $noreg);
                                                                        $this->db->where('a.kdtarif', $row2->kdtarif);
                                                                        $query3 = $this->db->get()->result();
                                                                        foreach ($query3 as $row3) {
                                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $row3->nmlab ?></th>
                                                                <td><?php echo $row3->deskripsi ?></td>
                                                                <td><?php echo $row3->nilai_min . ' - ' . $row3->nilai_max ?></td>
                                                                <td><?php echo $row3->nilai ?></td>
                                                                <td>
                                                                    <?php if (!empty($row3->nilai)) {
                                                                                            if ($row3->nilai >= $row3->nilai_min && $row3->nilai <= $row3->nilai_max) {
                                                                                                echo $row3->nilai_normal;
                                                                                            } else {
                                                                                                echo $row3->nilai_tidak_normal;
                                                                                            }
                                                                                        } else {
                                                                                            echo '-';
                                                                                        }
                                                                                        ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>

                                <?php }
                                    }
                                } ?>
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_direction-4" role="tabpanel">
                                <?php $this->load->view('t_daftar/resume_medis'); ?>
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