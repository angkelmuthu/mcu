<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA T_DAFTAR</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="<?php echo $action; ?>" method="post">
                            <?php
                            $action = $this->uri->segment(2);
                            $nomr = $this->uri->segment(4);
                            if ($action == 'create') {
                                $cekreg = $this->db->query("SELECT * from t_daftar where nomr='$nomr'");
                                $reg = $cekreg->row_array();
                                $num = $cekreg->num_rows();
                                if ($num > 0) {
                                    $noreg_max = $reg['noreg'];
                                } else {
                                    $user = $this->db->query("SELECT max(idreg) as max_idreg from t_daftar")->row_array();
                                    if (is_null($user['max_idreg'])) {
                                        $noreg_max = '00001';
                                    } else {
                                        $noreg_hash = $user['max_idreg'] + 1;
                                        $noreg_max = str_pad($noreg_hash, 5, '0', STR_PAD_LEFT);
                                    }
                                }
                            } else {
                                $noreg_max = $noreg;
                            }
                            ?>
                            <table class='table table-striped'>

                                <tr>
                                    <td width='200'>Noreg</td>
                                    <td><input type="text" class="form-control" name="noreg" value="<?php echo $noreg_max; ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nomr <?php echo form_error('nomr') ?></td>
                                    <td><input type="text" class="form-control" name="nomr" id="nomr" placeholder="Nomr" value="<?php echo $this->uri->segment(4); ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Baru <?php echo form_error('baru') ?></td>
                                    <td><input type="text" class="form-control" name="baru" id="baru" placeholder="Baru" value="<?php echo $this->uri->segment(3); ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Poliklinik <?php echo form_error('kdpoli') ?></td>
                                    <td><?php echo cmb_dinamis('kdpoli', 'm_poli', 'poli', 'kdpoli') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Dokter <?php echo form_error('kddokter') ?></td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kddokter" id="kddokter" class="select2 form-control w-100 select2-hidden-accessible" id="single-default" data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                                <?php
                                                $now = new DateTime();
                                                $now->setTimezone(new DateTimezone('Asia/Jakarta'));
                                                $jam = $now->format('H:i');
                                                foreach ($jadwaldok as $dok) {
                                                    if ($dok->jam_mulai <= $jam & $dok->jam_akhir >= $jam) {
                                                        $disable = '';
                                                    } else {
                                                        $disable = 'disabled';
                                                    }
                                                ?>
                                                    <option value="<?php echo $dok->kddokter ?>" <?php echo $disable ?>><?php echo $dok->dokter ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Cara Bayar <?php echo form_error('kdbayar') ?></td>
                                    <td><?php echo cmb_dinamis('kdbayar', 'm_bayar', 'bayar', 'kdbayar') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Rujukan <?php echo form_error('rujukan') ?></td>
                                    <td><input type="text" class="form-control" name="rujukan" id="rujukan" placeholder="Rujukan" value="<?php echo $rujukan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kdrujuk <?php echo form_error('kdrujuk') ?></td>
                                    <td><input type="text" class="form-control" name="kdrujuk" id="kdrujuk" placeholder="Kdrujuk" value="<?php echo $kdrujuk; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="form-control" name="idreg" value="<?php echo $idreg; ?>" readonly />
                                        <input type="text" class="form-control" name="tglreg" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                        <input type="text" class="form-control" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" readonly />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_daftar') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script>
    $(document).ready(function() {
        $(function() {
            $('.select2').select2();

            $(".select2-placeholder-multiple").select2({
                placeholder: "Select State"
            });
            $(".js-hide-search").select2({
                minimumResultsForSearch: 1 / 0
            });
            $(".js-max-length").select2({
                maximumSelectionLength: 2,
                placeholder: "Select maximum 2 items"
            });
            $(".select2-placeholder").select2({
                placeholder: "Select a state",
                allowClear: true
            });



            $(".js-select2-icons").select2({
                minimumResultsForSearch: 1 / 0,
                templateResult: icon,
                templateSelection: icon,
                escapeMarkup: function(elm) {
                    return elm
                }
            });

            function icon(elm) {
                elm.element;
                return elm.id ? "<i class='" + $(elm.element).data("icon") + " mr-2'></i>" + elm.text : elm.text
            }

            $(".js-data-example-ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Search for a repository',
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            function formatRepo(repo) {
                if (repo.loading) {
                    return repo.text;
                }

                var markup = "<div class='select2-result-repository clearfix d-flex'>" +
                    "<div class='select2-result-repository__avatar mr-2'><img src='" + repo.owner.avatar_url + "' class='width-2 height-2 mt-1 rounded' /></div>" +
                    "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title fs-lg fw-500'>" + repo.full_name + "</div>";

                if (repo.description) {
                    markup += "<div class='select2-result-repository__description fs-xs opacity-80 mb-1'>" + repo.description + "</div>";
                }

                markup += "<div class='select2-result-repository__statistics d-flex fs-sm'>" +
                    "<div class='select2-result-repository__forks mr-2'><i class='fal fa-lightbulb'></i> " + repo.forks_count + " Forks</div>" +
                    "<div class='select2-result-repository__stargazers mr-2'><i class='fal fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
                    "<div class='select2-result-repository__watchers mr-2'><i class='fal fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
                    "</div>" +
                    "</div></div>";

                return markup;
            }

            function formatRepoSelection(repo) {
                return repo.full_name || repo.text;
            }

        });
    });
</script>