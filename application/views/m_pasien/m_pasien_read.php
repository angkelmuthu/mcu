<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>M_pasien Read</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr>
                                <td>Nik</td>
                                <td><?php echo $nik; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $nama; ?></td>
                            </tr>
                            <tr>
                                <td>Tgllhr</td>
                                <td><?php echo $tgllhr; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?php echo $alamat; ?></td>
                            </tr>
                            <tr>
                                <td>Kodepos</td>
                                <td><?php echo $kodepos; ?></td>
                            </tr>
                            <tr>
                                <td>Kdklmn</td>
                                <td><?php echo $kdklmn; ?></td>
                            </tr>
                            <tr>
                                <td>Kdkawin</td>
                                <td><?php echo $kdkawin; ?></td>
                            </tr>
                            <tr>
                                <td>Hp</td>
                                <td><?php echo $hp; ?></td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td><?php echo $foto; ?></td>
                            </tr>
                            <tr>
                                <td>Tglinput</td>
                                <td><?php echo $tglinput; ?></td>
                            </tr>
                            <tr>
                                <td>Id Users</td>
                                <td><?php echo $id_users; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <a href="<?php echo site_url('t_daftar/create/N/' . $nomr) ?>" class="btn btn-primary waves-effect waves-themed">Daftar</a>
                                    <a href="<?php echo site_url('m_pasien') ?>" class="btn btn-warning waves-effect waves-themed">Kembali</a></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>