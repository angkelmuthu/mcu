<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
            <!-- profile summary -->
            <div class="card mb-g rounded-top">
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <img src="<?php echo base_url() ?>assets/smartadmin/img/demo/avatars/avatar-admin-lg.png" class="rounded-circle shadow-2 img-thumbnail" alt="">
                            <h5 class="mb-0 fw-700 text-center mt-3">
                                <?php echo $nama ?>
                                <!-- <small class="text-muted mb-0"><?php echo $nomr ?></small> -->
                            </h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-clean table-sm align-self-end">
                                    <tbody>
                                        <tr>
                                            <td>
                                                NOMR:
                                            </td>
                                            <td>
                                                <?php echo $nomr ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                NIK:
                                            </td>
                                            <td>
                                                <?php echo $nik ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Pembayaran:
                                            </td>
                                            <td>
                                                <?php echo $kdbayar ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Rujukan:
                                            </td>
                                            <td>
                                                <?php echo $rujukan ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center py-3">
                            <h5 class="mb-0 fw-700">
                                764
                                <small class="text-muted mb-0">Connections</small>
                            </h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center py-3">
                            <h5 class="mb-0 fw-700">
                                1,673
                                <small class="text-muted mb-0">Followers</small>
                            </h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 text-center">
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">Follow</a> <span class="text-primary d-inline-block mx-3">&#9679;</span>
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">Message</a> <span class="text-primary d-inline-block mx-3">&#9679;</span>
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">Connect</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 order-lg-3 order-xl-2">
            <!-- post comment -->
            <div class="card mb-g">
                <div class="card-body pb-0 px-4">
                    <div class="d-flex flex-row pb-3 pt-2  border-top-0 border-left-0 border-right-0">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".default-example-modal-right-sm">Asessment Perawat</button>
                    </div>
                    <!-- Modal Right Small -->
                    <div class="modal fade default-example-modal-right-sm" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-right modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h4">Large right side modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Berat Badan</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Tinggi Badan</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Suhu Badan</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Sistole</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Diastole</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Nadi</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Nafas</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="example-textarea">Keterangan</label>
                                            <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body py-0 px-4 border-faded border-right-0 border-bottom-0 border-left-0">
                    <div class="d-flex flex-column align-items-center">
                        <!-- comment -->
                        <div class="d-flex flex-row w-100 py-4">
                            <div class="d-inline-block align-middle status status-sm status-success mr-3">
                                <span class="profile-image profile-image-md rounded-circle d-block mt-1" style="background-image:url('img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
                            </div>
                            <div class="mb-0 flex-1 text-dark">
                                <div class="d-flex">
                                    <a href="javascript:void(0);" class="text-dark fw-500">
                                        Test name
                                    </a><span class="text-muted fs-xs opacity-70 ml-auto">
                                        15 minutes
                                    </span>
                                </div>
                                <p class="mb-0">
                                    Excellent work, looking forward to it.
                                </p>
                            </div>
                        </div>
                        <hr class="m-0 w-100">
                        <!-- comment end -->
                        <!-- comment -->
                        <div class="d-flex flex-row w-100 py-4">
                            <div class="d-inline-block align-middle status status-sm status-success mr-3">
                                <span class="profile-image profile-image-md rounded-circle d-block mt-1" style="background-image:url('img/demo/avatars/avatar-admin.png'); background-size: cover;"></span>
                            </div>
                            <div class="mb-0 flex-1 text-dark">
                                <div class="d-flex">
                                    <a href="javascript:void(0);" class="text-dark fw-500">
                                        Dr. Codex Lantern
                                    </a><span class="text-muted fs-xs opacity-70 ml-auto">
                                        3 minutes
                                    </span>
                                </div>
                                <p class="mb-0">
                                    Congrats mate!
                                </p>
                                <div class="pl-0 d-flex flex-row w-100 pb-0 pt-4">
                                    <div class="d-inline-block align-middle status status-sm status-success mr-3">
                                        <span class="profile-image profile-image-md rounded-circle d-block mt-1" style="background-image:url('img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
                                    </div>
                                    <div class="mb-0 flex-1 text-dark">
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="text-dark fw-500">
                                                Dr. John Cook PhD
                                            </a><span class="text-muted fs-xs opacity-70 ml-auto">
                                                30 seconds
                                            </span>
                                        </div>
                                        <p class="mb-0">
                                            Thanks!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0 w-100">
                        <!-- comment end -->
                        <!-- add comment -->
                        <div class="py-3 w-100">
                            <textarea class="form-control border-0 p-0" rows="2" placeholder="add a comment..."></textarea>
                        </div>
                        <!-- add comment end -->
                    </div>
                </div>
            </div>
            <!-- post comment - end -->
        </div>
        <div class="col-lg-6 col-xl-3 order-lg-2 order-xl-3">
            <!-- add : -->
            <!-- rating -->
            <div class="card mb-g">
                <div class="row row-grid no-gutters">
                    <div class="col-12">
                        <div class="p-3">
                            <h2 class="mb-0 fs-xl">
                                Dr. Codex Lantern's Rating
                            </h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 d-flex text-primary align-items-center fs-xl">
                            <i class="fas fa-star mr-1"></i>
                            <i class="fas fa-star mr-1"></i>
                            <i class="fas fa-star mr-1"></i>
                            <i class="fas fa-star mr-1"></i>
                            <i class="fal fa-star mr-1"></i>
                            <span class="ml-auto">4/5 Stars</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3">
                            <div class="fw-500 fs-xs">Staff</div>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar bg-primary-300 bg-primary-gradient" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3">
                            <div class="fw-500 fs-xs">Punctuality</div>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar bg-primary-300 bg-primary-gradient" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3">
                            <div class="fw-500 fs-xs">Helpfulness</div>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar bg-primary-300 bg-primary-gradient" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3">
                            <div class="fw-500 fs-xs">Knowledge</div>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar bg-primary-300 bg-primary-gradient" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3">
                            <div class="fw-500 fs-xs">Bedside manners</div>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar bg-danger-300 bg-warning-gradient" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 text-center">
                            <a href="javascript:void(0);" class="btn-link font-weight-bold">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>