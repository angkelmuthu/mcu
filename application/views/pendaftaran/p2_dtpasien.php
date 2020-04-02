<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/notifications/sweetalert2/sweetalert2.bundle.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <ul class="breadcrumbx">
                <li class="completed"><a href="javascript:void(0);">1 Installasi</a></li>
                <li class="active"><a href="javascript:void(0);">2 Data Pasien</a></li>
                <li><a href="javascript:void(0);">3 Pembayaran</a></li>
                <li><a href="javascript:void(0);">4 Poli / Kamar</a></li>
                <?php if ($this->uri->segment(3) == 'IGD' || $this->uri->segment(3) == 'RI') : ?>
                    <li><a href="javascript:void(0);">5 Keluarga</a></li>
                    <li><a href="javascript:void(0);">6 Verifikasi</a></li>
                <?php else : ?>
                    <li><a href="javascript:void(0);">5 Verifikasi</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-xl-12">
            <div class="container py-4">
                <div class="row">
                    <div class="col-xl-12 mt-0">
                        <h2 class="fs-xxl fw-500 mt-0 text-center">
                            Pencarian Pasien
                            <small class="h3 fw-300 mt-3 mb-5 opacity-70 hidden-sm-down">
                                Untuk memudahkan pencarian data pasien terdapat fitur <strong>TAP CARD</strong>.
                                Silahkan pilih metode pencarian pasien dibawah ini.
                            </small>
                        </h2>
                    </div>
                    <div class="col-xl-12 ml-auto mr-auto">
                        <h1 class="mb-2">
                            <small class="mb-1">
                                Tap kartu pasien disini.
                            </small>
                        </h1>
                        <form action="<?php echo site_url('pendaftaran/tap'); ?>" method="post">
                            <div class="input-group input-group-lg mb-5 shadow-1 rounded">
                                <input type="hidden" name="unit" value="<?php echo $this->uri->segment(3); ?>">
                                <input type="text" id="tap" name="tap" class="form-control shadow-inset-2" placeholder="tap kartu pasien atau ektp pasien" autofocus>
                                <div class="input-group-append">
                                    <button type="submit" name="btnCari" value="btnCari" class="btn btn-primary hidden-sm-down"><i class="fal fa-id-card-alt mr-lg-2"></i><span class="hidden-md-down">TAP</span></button>
                                </div>
                            </div>
                        </form>
                        <?php //echo $this->db->last_query();
                        ?>

                    </div>
                    <div class="col-xl-6 ml-auto mr-auto">
                        <a href="<?php echo base_url(); ?>m_pasien" class="card bg-success text-white text-center p-3">
                            <h2>Tampilkan Seluruh Data Pasien</h2>
                        </a>
                    </div>
                    <div class="col-xl-6 ml-auto mr-auto">
                        <a href="<?php echo base_url(); ?>m_pasien/create/Y" class="card bg-warning text-white text-center p-3">
                            <h2>Pendaftaran Pasien Baru</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
<!-- <script>
    $(document).ready(function() {
        "use strict";
        $("#js-sweetalert2-example-2").on("click", function() {
            Swal.fire("The Internet?", "That thing is still around?", "question");
        }); //A modal with a title, an error icon, a text, and a footer
    });
</script> -->
<?php if ($this->session->flashdata('success')) :
    $arr = $this->session->flashdata('success');
?>
    <script>
        swal.fire({
            title: "Data Berhasil Ditemukan",
            html: '<div class="d-flex flex-column align-items-center justify-content-center p-4">' +
                '<img src="<?php echo base_url() ?>assets/smartadmin/img/demo/avatars/avatar-admin-lg.png" class="rounded-circle shadow-2 img-thumbnail">' +
                '<h5 class="mb-0 fw-700 text-center mt-3" style="text-transform: uppercase;"><?php echo $arr['nama'] ?></h5>' +
                '<hr>' +
                '<div class="table-responsive">' +
                '<table class="table table-bordered table-striped">' +
                '<tr>' +
                '<td width="50%" class="text-center">NOMR</td>' +
                '<td width="50%" class="text-center">NIK</td>' +
                '</tr>' +
                '<tr>' +
                '<td class="text-center"><b><?php echo $arr['nomr'] ?></b></td>' +
                '<td class="text-center"><b><?php echo $arr['nik'] ?></b></td>' +
                '</tr>' +
                '<tr>' +
                '<td class="text-center">Handphone</td>' +
                '<td class="text-center">Tgl Lahir</td>' +
                '</tr>' +
                '<tr>' +
                '<td class="text-center"><b><?php echo $arr['hp'] ?></b></td>' +
                '<td class="text-center"><b><?php echo tanggal($arr['tgllhr']) ?></b></td>' +
                '</tr>' +
                '<tr>' +
                '<td colspan="2" class="text-center">Alamat</td>' +
                '</tr>' +
                '<tr>' +
                '<td colspan="2" class="text-center"><b><?php echo $arr['alamat'] ?></b></td>' +
                '</tr>' +
                '</table>' +
                '</div>' +
                '</div>',
            showConfirmButton: false,
            footer: "<a class='btn btn-block btn-primary' href='<?php echo site_url('pendaftaran/tiga/' . $this->uri->segment(3) . '/' . $arr['nomr'] . '/N'); ?>'>DAFTAR</a>",
            //timer: 5000,
        });
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
    <script>
        swal.fire({
            title: "Data Tidak Ditemukan",
            text: "Silahkan masukkan kata kunci yg sesuai",
            button: false,
            timer: 5000,
        });
    </script>
<?php endif; ?>