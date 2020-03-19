<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                    <div class="row">
                        <div class="col-xl-12 mb-5">
                            <h2 class="fs-xxl fw-500 mt-1 text-center">
                                Cara Pembayaran
                                <small class="h3 fw-300 mt-3 mb-5 opacity-70 hidden-sm-down">
                                    Pilih salah satu metode pembayaran <strong>UMUM</strong> atau <strong>BPJS</strong>
                                </small>
                            </h2>
                        </div>
                        <div class="col-xl-6 ml-auto mr-auto">
                            <a href="<?php echo base_url(); ?>t_daftar/unitopt/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/N" class="card bg-primary text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h3>PASIEN UMUM</h3>
                                    <footer class="blockquote-footer text-white">
                                        <h6>
                                            Pasien Umum menggunakan cara bayar TUNAI atau ASURANSI
                                        </h6>
                                    </footer>
                                </blockquote>
                            </a>
                        </div>

                        <div class="col-xl-6 ml-auto mr-auto">
                            <a href="<?php echo base_url(); ?>t_daftar/create/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/Y" class="card bg-success text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h3>PASIEN BPJS</h3>
                                    <footer class="blockquote-footer text-white">
                                        <h6>
                                            Pasien BPJS menggunakan cara bayar BPJS atau ASKES
                                        </h6>
                                    </footer>
                                </blockquote>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>