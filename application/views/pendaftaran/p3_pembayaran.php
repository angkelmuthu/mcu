<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <ul class="breadcrumbx">
                <li class="completed"><a href="javascript:void(0);">1 Installasi</a></li>
                <li class="completed"><a href="javascript:void(0);">2 Data Pasien</a></li>
                <li class="active"><a href="javascript:void(0);">3 Pembayaran</a></li>
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
            <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 mb-5">
                            <h2 class="fs-xxl fw-500 mt-1 text-center">
                                Cara Pembayaran
                                <small class="h3 fw-300 mt-3 mb-5 opacity-70 hidden-sm-down">
                                    Pilih salah satu metode pembayaran <strong>UMUM</strong> atau <strong>BPJS</strong> dan lain-lain.
                                </small>
                            </h2>
                        </div>
                        <?php
                        $unit = $this->uri->segment(3);
                        $nomr = $this->uri->segment(4);
                        $baru = $this->uri->segment(5);
                        foreach ($metodebayar as $mb) {
                            if ($mb->kdmetodebayar == 1) :
                                $color = 'bg-success';
                            elseif ($mb->kdmetodebayar == 2) :
                                $color = 'bg-primary';
                            elseif ($mb->kdmetodebayar == 3) :
                                $color = 'bg-danger';
                            elseif ($mb->kdmetodebayar == 4) :
                                $color = 'bg-warning';
                            endif;
                        ?>
                            <div class="col-xl-6 ml-auto mr-auto mb-3">
                                <a href="<?php echo site_url('pendaftaran/empat/' . $unit . '/' . $nomr . '/' . $baru . '/' . $mb->kdmetodebayar); ?>" class="card <?php echo $color ?> text-white text-center p-3">
                                    <blockquote class="blockquote mb-0">
                                        <h3><?php echo $mb->metode ?></h3>
                                        <footer class="blockquote-footer text-white">
                                            <h6>
                                                <?php echo $mb->keterangan ?>
                                            </h6>
                                        </footer>
                                    </blockquote>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>