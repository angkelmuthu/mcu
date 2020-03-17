<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/miscellaneous/lightgallery/lightgallery.bundle.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Upload Hasil Radiologi</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form method="post" action="<?php echo base_url(); ?>t_radhasil/upload_files" enctype="multipart/form-data">
                            <input type="hidden" name="nobill" value="<?php echo $this->uri->segment(3); ?>" />
                            <input type="hidden" name="noreg" value="<?php echo $this->uri->segment(4); ?>" />
                            <input type="hidden" name="kdtarif" value="<?php echo $this->uri->segment(5); ?>" />
                            <div class="form-group">
                                <label class="form-label" for="inputGroupFile01"></label>Upload File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="files[]" multiple class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <!-- <span class="input-group-text" id="inputGroupFileAddon02">Upload</span> -->
                                        <input type="submit" class="input-group-text" id="inputGroupFileAddon02" name="fileSubmit" value="UPLOAD" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <?php if (!empty($files)) { ?>
                            <div id="js-lightgallery">
                                <?php foreach ($files as $file) { ?>

                                    <a class="" href="<?php echo base_url('assets/file_radiologi/' . $file['file_name']); ?>">
                                        <img class="img-responsive" src="<?php echo base_url('assets/file_radiologi/' . $file['file_name']); ?>" alt="<?php echo date("j M Y h:s:i", strtotime($file['uploaded_on'])); ?>">
                                    </a>

                                    <!-- <li class="item">
                                            <img src="<?php echo base_url('assets/file_radiologi/' . $file['file_name']); ?>">
                                            <p>Uploaded On <?php echo date("j M Y", strtotime($file['uploaded_on'])); ?></p>
                                        </li> -->
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <br>
                            <div class="alert border-info bg-transparent text-info" role="alert">
                                <strong>Info!</strong> Hasil belum tersedia.
                            </div>
                        <?php } ?>
                        <?php echo $this->session->flashdata('statusMsg'); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/miscellaneous/lightgallery/lightgallery.bundle.js"></script>
<script>
    $(document).ready(function() {
        var $initScope = $('#js-lightgallery');
        if ($initScope.length) {
            $initScope.justifiedGallery({
                border: -1,
                rowHeight: 150,
                margins: 8,
                waitThumbnailsLoad: true,
                randomize: false,
            }).on('jg.complete', function() {
                $initScope.lightGallery({
                    thumbnail: true,
                    animateThumb: true,
                    showThumbByDefault: true,
                });
            });
        };
        $initScope.on('onAfterOpen.lg', function(event) {
            $('body').addClass("overflow-hidden");
        });
        $initScope.on('onCloseAfter.lg', function(event) {
            $('body').removeClass("overflow-hidden");
        });
    });
</script>