<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA M_TARIF</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo anchor(site_url('m_tarif/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?></div>
                            <div class="col-md-6">
                                <form action="<?php echo site_url('m_tarif/index'); ?>" method="get">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <div class="input-group-prepend">
                                                    <a href="<?php echo site_url('m_tarif'); ?>" class="btn btn-danger waves-effect waves-themed">Reset</a>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <input id="button-addon3" type="text" name="q" value="<?php echo $q; ?>" class="form-control" placeholder="Search for anything..." aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary waves-effect waves-themed" type="submit">Search</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="frame-wrap">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-themed">
                                    <tr>
                                        <th>No</th>
                                        <th>Nmtarif</th>
                                        <th>Kdpoli</th>
                                        <th>Paket</th>
                                        <th>Aktif</th>
                                        <th>Tglinput</th>
                                        <th>Id Users</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                        foreach ($m_tarif_data as $m_tarif) {
                                        ?>
                                        <tr>
                                            <td width="10px"><?php echo ++$start ?></td>
                                            <td><?php echo $m_tarif->nmtarif ?></td>
                                            <td><?php echo $m_tarif->kdpoli ?></td>
                                            <td><?php echo $m_tarif->paket ?></td>
                                            <td><?php echo $m_tarif->aktif ?></td>
                                            <td><?php echo $m_tarif->tglinput ?></td>
                                            <td><?php echo $m_tarif->id_users ?></td>
                                            <td style="text-align:center" width="200px">
                                                <?php
                                                echo anchor(site_url('m_tarif/read/' . $m_tarif->kdtarif), '<i class="fal fa-eye" aria-hidden="true"></i>', 'class="btn btn-info btn-xs waves-effect waves-themed"');
                                                echo '  ';
                                                echo anchor(site_url('m_tarif/update/' . $m_tarif->kdtarif), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-xs waves-effect waves-themed"');
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>

                            <?php echo $pagination ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>