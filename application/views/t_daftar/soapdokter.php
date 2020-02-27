<div class="well">
    <button type="button" id="btn-tambah" data-toggle="modal" data-target="#form-modal" class="btn btn-success pull-right">
        <span class="glyphicon glyphicon-plus"></span> Tambah Data
    </button>
    <h2 style="margin-top: 0;">Data Siswa</h2>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th class="text-center">NO</th>
            <th>NIS</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>TELP</th>
            <th>ALAMAT</th>
            <th class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
        </tr>
        <?php
        $no = 1;
        foreach ($get_icd as $icd) {
            ?>
            <tr>
                <td class="align-middle text-center"><?php echo $no; ?></td>
                <td class="align-middle"><?php echo $icd->id; ?></td>
                <td class="align-middle"><?php echo $icd->noreg; ?></td>
                <td class="align-middle"><?php echo $icd->nobill; ?></td>
                <td class="align-middle"><?php echo $icd->ket; ?></td>
                <td class="align-middle"><?php echo $icd->code; ?></td>
                <td class="align-middle text-center">
                    <a href="javascript:void();" data-id="<?php echo $icd->id; ?>" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger btn-alert-hapus"><span class="fal fa-trash"></span></a>
                </td>
            </tr>
        <?php
            $no++; // Tambah 1 setiap kali looping
        }
        ?>
    </table>
</div>

<div id="form-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <!-- Beri id "modal-title" untuk tag span pada judul modal -->
                    <span id="modal-title"></span>
                </h4>
            </div>
            <div class="modal-body">
                <!-- Beri id "pesan-error" untuk menampung pesan error -->
                <div id="pesan-error" class="alert alert-danger"></div>
                <form>
                    <input type="text" class="form-control" id="noreg" name="noreg" placeholder="NIS">
                    <input type="text" class="form-control" id="nobill" name="nobill" placeholder="Nama">
                    <input type="text" class="form-control" id="ket" name="ket" placeholder="Nama">
                    <input type="text" class="form-control" id="kddokter" name="kddokter" placeholder="Nama">
                    <div class="form-group">
                        <label>ICD</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="No. Telepon">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- Beri id "loading-simpan" untuk loading ketika klik tombol simpan -->
                <div id="loading-simpan" class="pull-left">
                    <b>Sedang menyimpan...</b>
                </div>
                <!-- Beri id "btn-simpan" untuk tombol simpan nya -->
                <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!--
    -- Membuat sebuah tag div untuk Modal Dialog untuk Form Tambah dan Ubah
    -- Beri id "form-modal" untuk tag div tersebut
    -->
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    Konfirmasi
                </h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <!-- Beri id "loading-hapus" untuk loading ketika klik tombol hapus -->
                <div id="loading-hapus" class="pull-left">
                    <b>Sedang meghapus...</b>
                </div>
                <!-- Beri id "btn-hapus" untuk tombol hapus nya -->
                <button type="button" class="btn btn-primary" id="btn-hapus">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>