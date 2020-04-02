<main id="js-page-content" role="main" class="page-content">

    <div class="row">
        <div class="col-xl-12">
            <ul class="breadcrumbx">
                <li class="active"><a href="javascript:void(0);">1 Installasi</a></li>
                <li><a href="javascript:void(0);">2 Data Pasien</a></li>
                <li><a href="javascript:void(0);">3 Pembayaran</a></li>
                <li><a href="javascript:void(0);">4 Poli / Kamar</a></li>
                <li><a href="javascript:void(0);">5 Verifikasi</a></li>
            </ul>
        </div>
        <div class="col-xl-12">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12 mb-5">
                        <h2 class="fs-xxl fw-500 mt-1 text-center">
                            Installasi
                            <small class="h3 fw-300 mt-3 mb-5 opacity-70 hidden-sm-down">
                                Pilih Intallasi yang dituju.
                            </small>
                        </h2>
                    </div>
                    <div class="col-xl-12">
                        <div class="demo text-center">
                            <?php
                            $this->db->from('m_unit');
                            $units = $this->db->get()->result();
                            foreach ($units as $unit) { ?>
                                <a href="<?php echo base_url(); ?>pendaftaran/dua/<?php echo $unit->kdunit ?>" class="btn btn-outline-success btn-lg waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="
                                    <?php $this->db->from('m_poli');
                                    $this->db->where('kdunit', $unit->kdunit);
                                    $polis = $this->db->get()->result();
                                    foreach ($polis as $poli) {
                                        echo $poli->poli . ', ';
                                    } ?>
                                    " data-original-title="Terdapat Poli atau sub unit">
                                    <?php echo $unit->unit; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>