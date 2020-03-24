<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>FORM PENDAFTARAN PASIEN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form id="form1" name="form1" action="<?php echo $action; ?>" method="post">
                            <?php
                            $action = $this->uri->segment(2);
                            $baru = $this->uri->segment(3);
                            $nomr = $this->uri->segment(4);
                            $bayar = $this->uri->segment(5);
                            $unit = $this->uri->segment(6);
                            if ($action == 'create') {
                                $cekreg = $this->db->query("SELECT * from v_bill where nomr='$nomr' and status='BL'");
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
                                <input type="hidden" class="form-control" name="noreg" value="<?php echo $noreg_max; ?>" readonly />
                                <input type="hidden" class="form-control" name="nomr" value="<?php echo $nomr ?>" readonly />
                                <input type="hidden" class="form-control" name="baru" value="<?php echo $baru ?>" readonly />
                                <?php
                                $this->db->from('m_unit');
                                $this->db->where('kdunit', $unit);
                                $inap = $this->db->get()->row_array();
                                if ($inap['inap'] == 'N') {
                                ?>
                                    <tr>
                                        <td>
                                            <h3>Poliklinik</h3> <?php echo form_error('kdpoli') ?>
                                        </td>
                                        <td>
                                            <?php foreach ($get_poli as $row) : ?>
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="kdpoli" id="kdpoli" value="<?php echo $row->kdpoli; ?>"><?php echo $row->poli; ?>
                                                </label>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td>
                                            <h3>Ruang</h3> <?php echo form_error('kdpoli') ?>
                                        </td>
                                        <td>
                                            <?php foreach ($get_ruang as $row) : ?>
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="kdruang" id="kdruang" value="<?php echo $row->kdruang; ?>"><?php echo $row->ruang; ?>
                                                </label>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <h3>Dokter</h3> <?php echo form_error('kddokter') ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kddokter" id="kddokter" class="select2 form-control w-100 select2-hidden-accessible" id="single-default" data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                if ($bayar == 'Y') {
                                    echo '<input type="hidden" class="form-control" name="kdbayar" id="kdbayar" placeholder="kdbayar" value="1" />';
                                } else { ?>
                                    <tr>
                                        <td>
                                            <h3>Metode Pembayaran</h3> <?php echo form_error('kdbayar') ?>
                                        </td>
                                        <td>
                                            <?php foreach ($get_metode as $row) : ?>
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="metode" id="metode" value="<?php echo $row->kdmetodebayar; ?>"><?php echo $row->metode; ?>
                                                </label>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Pembayaran</h3>
                                        </td>
                                        <td>
                                            <div id='bayar'>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <h3>Apakah Pasien ini Rujukan?</h3> <?php echo form_error('rujukan') ?>
                                    </td>
                                    <td>
                                        <div class="form-check-inline">
                                            <label class="customradio"><span class="radiotextsty">Ya, Pasien Rujukan</span>
                                                <input type="radio" name="rujukan" id="rujukan" value="Y" onclick="show2();">
                                                <span class="checkmark"></span>
                                            </label>        
                                            <label class="customradio"><span class="radiotextsty">Tidak, Bukan Pasien Rujukan</span>
                                                <input type="radio" checked="checked" name="rujukan" id="rujukan" value="N">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="div1" style="display: none;">
                                            <h3>Perujuk <?php echo form_error('kdrujuk') ?></h3>
                                            <input type="text" class="form-control" name="kdrujuk" id="kdrujuk" value="<?php echo $kdrujuk; ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" class="form-control" name="idreg" value="<?php echo $idreg; ?>" readonly />
                                        <input type="hidden" class="form-control" name="tglreg" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                                        <input type="hidden" class="form-control" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" readonly />
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
<!-- <script src="<?php echo base_url(); ?>assets/jquery.min.js"></script> -->
<script type="text/javascript">
    function show1() {
        document.getElementById('div1').style.display = 'none';
    }

    function show2() {
        document.getElementById('div1').style.display = 'block';
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //$('#metode').change(function() {
        $('input[type=radio][name="metode').change(function() {
            var id = $(this).val();
            //var id = $("input[name=metode]");
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/t_daftar/get_bayar",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        // /html += '<option>' + data[i].bayar + '</option>';
                        html += '<label class="btn btn-success">' +
                            '<input type="radio" name="kdbayar" id="kdbayar" value="' + data[i].kdbayar + '">' + data[i].bayar +
                            '</label>';
                    }
                    $('#bayar').html(html);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //$('#metode').change(function() {
        $('input[type=radio][name="kdpoli').change(function() {
            var id = $(this).val();
            //var id = $("input[name=metode]");
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/t_daftar/jadwaldokter",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var dt = new Date();
                    var time = dt.getHours() + ":" + dt.getMinutes();
                    for (i = 0; i < data.length; i++) {
                        var jam_akhir = data[i].jam_akhir;
                        if (time > jam_akhir) {
                            var disable = "disabled";
                        } else {
                            var disable = "";
                        }
                        html += '<option value="' + data[i].kddokter + '" ' + disable + '>Jam : ' + data[i].jam_mulai + ' - ' + data[i].jam_akhir + ' | ' + data[i].dokter + '</option>';
                    }
                    $('#kddokter').html(html);
                }
            });
        });
    });
    ///////////////////////////////////////////////
    $(document).ready(function() {
        //$('#metode').change(function() {
        $('input[type=radio][name="kdruang').change(function() {
            var id = $(this).val();
            //var id = $("input[name=metode]");
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/t_daftar/jadwaldokterIGD",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var dt = new Date();
                    var time = dt.getHours() + ":" + dt.getMinutes();
                    for (i = 0; i < data.length; i++) {
                        var jam_akhir = data[i].jam_akhir;
                        if (time > jam_akhir) {
                            var disable = "disabled";
                        } else {
                            var disable = "";
                        }
                        html += '<option value="' + data[i].kddokter + '" ' + disable + '>Jam : ' + data[i].jam_mulai + ' - ' + data[i].jam_akhir + ' | ' + data[i].dokter + '</option>';
                    }
                    $('#kddokter').html(html);
                }
            });
        });
    });
</script>
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