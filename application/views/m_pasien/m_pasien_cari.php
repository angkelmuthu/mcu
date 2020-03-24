<main id="js-page-content" role="main" class="page-content">
    <div class="row">
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
                    <div class="col-xl-3 ml-auto mr-auto">
                        <a class="card bg-primary text-white text-center p-3" onclick="toggleVisibility('tab');">
                            <h2>Tap Kartu Pasien atau E-KTP</h2>
                        </a>
                    </div>
                    <div class="col-xl-3 ml-auto mr-auto">
                        <a class="card bg-info text-white text-center p-3" onclick="toggleVisibility('by');">
                            <h2>Pencarian Data<br>Pasien</h2>
                        </a>sa
                    </div>
                    <div class="col-xl-3 ml-auto mr-auto">
                        <a href="<?php echo base_url(); ?>m_pasien" class="card bg-success text-white text-center p-3">
                            <h2>Tampilkan Seluruh Data Pasien</h2>
                        </a>
                    </div>
                    <div class="col-xl-3 ml-auto mr-auto">
                        <a href="<?php echo base_url(); ?>m_pasien/create/Y" class="card bg-warning text-white text-center p-3">
                            <h2>Pendaftaran Pasien Baru</h2>
                        </a>
                    </div>
                    <div id="tab" class="col-xl-12">
                        <!-- <div class="pt-4"> -->
                        <div class="alert bg-primary-500" role="alert">
                            <h5>Tap Kartu Pasien atau E-KTP</h5>
                        </div>
                        <div class="input-group input-group-lg mb-5 shadow-1 rounded">
                            <input type="text" id="tap" class="form-control shadow-inset-2" id="filter-icon" aria-label="type 2 or more letters" placeholder="tap kartu pasien atau ektp pasien" autofocus>
                            <div class="input-group-append">
                                <button class="btn btn-primary hidden-sm-down" type="button"><i class="fal fa-id-card-alt mr-lg-2"></i><span class="hidden-md-down">TAP</span></button>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div id="by" class="col-xl-12 ml-auto mr-auto" style="display: none;">
                        <!-- <div class="pt-4"> -->
                        <div class="alert text-white bg-info-500" role="alert">
                            <h5>Pencarian Data Pasien</h5>
                        </div>
                        <!-- <h1 class="mb-2">
                                    <small class="mb-1">
                                        Request time (0.23 seconds)
                                    </small>
                                </h1> -->
                        <div class="input-group input-group-lg mb-5 shadow-1 rounded">
                            <input type="text" class="form-control shadow-inset-2" id="filter-icon" aria-label="type 2 or more letters" placeholder="Search anything...">
                            <div class="input-group-append">
                                <button class="btn btn-primary hidden-sm-down" type="button"><i class="fal fa-search mr-lg-2"></i><span class="hidden-md-down">Search</span></button>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script>
    var divs = ["tab", "by"];
    var visibleDivId = null;

    function toggleVisibility(divId) {
        if (visibleDivId === divId) {
            //visibleDivId = null;
        } else {
            visibleDivId = divId;
        }
        hideNonVisibleDivs();
    }

    function hideNonVisibleDivs() {
        var i, divId, div;
        for (i = 0; i < divs.length; i++) {
            divId = divs[i];
            div = document.getElementById(divId);
            if (visibleDivId === divId) {
                div.style.display = "block";
                document.getElementById("tap").focus();
            } else {
                div.style.display = "none";
            }
        }
    }
</script>