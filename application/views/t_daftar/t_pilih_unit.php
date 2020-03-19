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
                        <div class="col-xl-12">
                        <div class="demo text-center">
                            <?php
                                $baru=$this->uri->segment(3);
                                $nomr=$this->uri->segment(4);
                                $bpjs=$this->uri->segment(5);
                                $this->db->from('m_unit');
                                //$this->db->order_by('unit', 'asc');
                                $units = $this->db->get()->result();
                                foreach ($units as $unit) { ?>
<a href="<?php echo base_url(); ?>t_daftar/create/<?php echo $baru.'/'.$nomr.'/'.$bpjs.'/'.$unit->kdunit ?>" class="btn btn-outline-success btn-lg waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="<?php $this->db->from('m_poli');
                                $this->db->where('kdunit', $unit->kdunit);
                                $polis = $this->db->get()->result();
                                foreach ($polis as $poli) { echo $poli->poli.', '; }?>" data-original-title="Terdapat Poli atau sub unit">
    <?php echo $unit->unit; ?>
                                </a>
                                <?php } ?>
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