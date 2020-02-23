<div class="row">
    <div class="col-md-6">
        <button type="button" class="btn btn-block btn-info waves-effect waves-themed" data-toggle="modal" data-target=".modal-tindakan">Tindakan</button>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-block btn-success waves-effect waves-themed" data-toggle="modal" data-target=".modal-obat">Obat</button>
    </div>
</div>
<hr>
<div id="reload">
    <table class="table" id="">
        <thead>
            <tr>
                <th class="border-top-0 table-scale-border-bottom">Nama Tindakan</th>
                <th class="text-right border-top-0 table-scale-border-bottom">Harga</th>
                <th class="text-center border-top-0 table-scale-border-bottom">Qty</th>
                <th class="text-right border-top-0 table-scale-border-bottom">Total</th>
                <th class="text-right border-top-0 table-scale-border-bottom"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="5"><b>TINDAKAN</b></td>
            </tr>
        </tbody>
        <tbody id="show_data">

        </tbody>
        <tbody>
            <tr>
                <td colspan="5"><b>RESEP</b></td>
            </tr>
        </tbody>
        <tbody id="show_obat">
        </tbody>
    </table>
</div>
<!--MODAL HAPUS Tindakan-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="idbill" id="textidbill" value="">
                    <div class="alert alert-warning">
                        <p>Apakah Anda yakin mau memhapus barang ini?</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL HAPUS-->
<!--MODAL HAPUS Obat-->
<div class="modal fade" id="ModalHapusObat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Obat</h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="nobillobat" id="textnobillobat" value="">
                    <div class="alert alert-warning">
                        <p>Apakah Anda yakin mau memhapus barang ini?</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button class="btn_hapus_obat btn btn-danger" id="btn_hapus_obat">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL HAPUS-->
<div class="modal fade modal-tindakan" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Master Tarif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover table-striped w-100" id="tarif">
                    <thead>
                        <tr>
                            <th>Group Tarif</th>
                            <th>Nama Tarif</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listtarif as $tarif) { ?>
                            <tr>
                                <td><b style="text-transform: uppercase;"><?php echo $tarif->poli ?></b></td>
                                <td><?php echo $tarif->nmtarif ?></td>
                                <td><?php echo number_format($tarif->harga) ?></td>
                                <td>
                                    <input type="hidden" name="noreg" id="noreg<?php echo $tarif->kdtarif ?>" value="<?php echo $noreg ?>">
                                    <button class="btn btn-info btn-xs" id="btn_simpan<?php echo $tarif->kdtarif ?>"><i class="fal fa-plus"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-themed">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- modal Obat -->
<div class="modal fade modal-obat" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Master Tarif Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listobat as $obat) {
                            if ($obat->stok == 0) {
                                $hidden = ' disabled';
                            } else {
                                $hidden = '';
                            }
                        ?>
                            <tr>
                                <td><b style="text-transform: uppercase;"><?php echo $obat->obat ?></b></td>
                                <td>Rp. <?php echo number_format($obat->hargaobat) ?></td>
                                <td><?php echo number_format($obat->stok) ?></td>
                                <td>
                                    <input type="hidden" name="noreg" id="noreg<?php echo $obat->kdobat ?>" value="<?php echo $noreg ?>">
                                    <input type="hidden" name="user" id="user<?php echo $obat->kdobat ?>" value="<?php echo $this->session->userdata('id_users'); ?>">
                                    <button class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" <?php echo $hidden ?> id="btn_simpanobat<?php echo $obat->kdobat ?>"><i class="fal fa-plus"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-themed">Save changes</button>
            </div>
        </div>
    </div>
</div>