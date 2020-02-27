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
            <div class="col-6 mb-3">
            </div>
            <hr>
            <!-- <div class="col-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">DIAGNOSA MASUK (ICD10)</label>
                                                    <input type="text" class="form-control" id="icdmasuk" placeholder="icd 10">
                                                </div>
                                            </div> -->
            <!-- <div class="col-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">DIAGNOSA AKHIR (ICD10)</label>
                                                    <input type="text" class="form-control" id="icdakhir" placeholder="icd 10">
                                                </div>
                                            </div> -->
            <div class="col-12 mb-3">
                <div class="form-group">
                    <label class="form-label" for="example-textarea">DIAGNOSA (ICD10)</label>
                </div>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">JENIS DIAGNOSA</th>
                            <th width="50%">DIAGNOSA LAIN</th>
                            <th>ICD10</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <select name="jns_diagnosa" class="form-control">
                                    <option value="UTAMA">Utama</option>
                                    <option value="SEKUNDER">Sekunder</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd101" placeholder="icd 9"></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>
                                <select name="jns_diagnosa" class="form-control">
                                    <option value="SEKUNDER">Sekunder</option>
                                    <option value="UTAMA">Utama</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd102" placeholder="icd 9"></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>
                                <select name="jns_diagnosa" class="form-control">
                                    <option value="SEKUNDER">Sekunder</option>
                                    <option value="UTAMA">Utama</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd103" placeholder="icd 9"></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>
                                <select name="jns_diagnosa" class="form-control">
                                    <option value="SEKUNDER">Sekunder</option>
                                    <option value="UTAMA">Utama</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd104" placeholder="icd 9"></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>
                                <select name="jns_diagnosa" class="form-control">
                                    <option value="SEKUNDER">Sekunder</option>
                                    <option value="UTAMA">Utama</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd105" placeholder="icd 9"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 mb-3">
                <div class="form-group">
                    <label class="form-label" for="example-textarea">TINDAKAN (ICD9)</label>
                </div>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="60%">PROSEDUR</th>
                            <th>ICD9</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd91" placeholder="icd 9"></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd92" placeholder="icd 9"></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd93" placeholder="icd 9"></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd94" placeholder="icd 9"></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" id="icd95" placeholder="icd 9"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6 mb-3">
            </div>
        </div>

        <div class="p-3 text-center">
            <button type="submit" class="btn btn-sm btn-primary font-weight-bold">Simpan</button>
        </div>
    </div>
</form>