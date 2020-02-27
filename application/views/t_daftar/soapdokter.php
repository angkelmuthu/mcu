<form action="" method="post">
    <div class="col-12">
        <input type="hidden" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" />
        <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
        <div class="row">
            <div class="col-6 mb-3">
                <div class="form-group">
                    <label class="form-label" for="example-textarea">RIWAYAT ALERGI</label>
                    <textarea class="form-control" name="subjek" id="example-textarea" rows="2"></textarea>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="form-group">
                    <label class="form-label" for="example-textarea">KELUHAN UTAMA</label>
                    <textarea class="form-control" name="subjek" id="example-textarea" rows="2"></textarea>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="form-group">
                    <label class="form-label" for="example-textarea">RINGKASAN RIWAYAT PENYAKIT</label>
                    <textarea class="form-control" name="objek" id="example-textarea" rows="2"></textarea>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="form-group">
                    <label class="form-label" for="example-textarea">INSTRUKSI</label>
                    <textarea class="form-control" name="plann" id="example-textarea" rows="2"></textarea>
                </div>
            </div>
            <div class="col-6 mb-3"></div>

            <div class="col-12 mb-3">
                <h2 class="fw-700 mt-2 mb-2"><i class="subheader-icon fal fa-list-alt"></i>DIAGNOSA (ICD10)</h2>
                <div id="reload">
                    <table class="table table-bordered" id="">
                        <thead class="bg-info-500">
                            <tr>
                                <th width="15%">Diagnosa</th>
                                <th width="25%">Prosedur</th>
                                <th>ICD 10</th>
                                <th>Deskripsi</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="jns_diagnosa" id="jns_diagnosa" class="form-control">
                                        <option value="UTAMA">Utama</option>
                                        <option value="SEKUNDER">Sekunder</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="ket" id="ket" class="form-control" placeholder="">
                                </td>
                                <td colspan="2">
                                    <input type="text" name="code" class="form-control" id="icd10" placeholder="icd 10">
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" id="btn_simpanicd"><i class="fal fa-plus"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody id="show_icd">

                        </tbody>
                    </table>
                </div>
                <!--MODAL HAPUS Obat-->
                <div class="modal fade" id="ModalHapusICD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                <h4 class="modal-title" id="myModalLabel">Hapus ICD</h4>
                            </div>
                            <form class="form-horizontal">
                                <div class="modal-body">

                                    <input type="hidden" name="idicd" id="textidicd" value="">
                                    <div class="alert alert-warning">
                                        <p>Apakah Anda yakin mau memhapus barang ini?</p>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button class="btn_hapus_icd btn btn-danger" id="btn_hapus_icd">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!--------------------------------------------->
            <div class="col-12 mb-3">
                <h2 class="fw-700 mt-2 mb-2"><i class="subheader-icon fal fa-list-alt"></i>TERAPI DAN ATAU TINDAKAN (ICD9)</h2>
                <div id="reload">
                    <table class="table table-bordered" id="">
                        <thead class="bg-info-500">
                            <tr>
                                <th width="25%">Prosedur</th>
                                <th>ICD 9</th>
                                <th>Deskripsi</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="ket9" id="ket9" class="form-control" placeholder="">
                                </td>
                                <td colspan="2">
                                    <input type="text" name="code" class="form-control" id="icd9" placeholder="icd 9">
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" id="btn_simpanicd9"><i class="fal fa-plus"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody id="show_icd9">

                        </tbody>
                    </table>
                </div>
                <!--MODAL HAPUS Obat-->
                <div class="modal fade" id="ModalHapusICD9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                <h4 class="modal-title" id="myModalLabel">Hapus ICD</h4>
                            </div>
                            <form class="form-horizontal">
                                <div class="modal-body">

                                    <input type="hidden" name="idicd" id="textidicd" value="">
                                    <div class="alert alert-warning">
                                        <p>Apakah Anda yakin mau memhapus barang ini?</p>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button class="btn_hapus_icd9 btn btn-danger" id="btn_hapus_icd9">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-6 mb-3">
            </div>
        </div>

        <div class="p-3 text-center">
            <button type="submit" class="btn btn-sm btn-primary font-weight-bold">Simpan</button>
        </div>
    </div>
</form>