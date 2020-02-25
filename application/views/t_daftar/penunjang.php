<table class="table m-0">
    <thead class="bg-primary-500">
        <tr>
            <th width="5%">No.</th>
            <th width="50%">Pemeriksaan</th>
            <!-- <th>Deskripsi</th> -->
            <th width="15%">Nilai Standar</th>
            <th width="10%">Nilai</th>
            <th width="15%">Hasil</th>
            <th width="5%"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $this->datatables->select('nobill,noreg,kdtarif,nilai,tglinput,id_users');
        $this->datatables->from('t_labhasil');
        foreach ($list_lab as $lab) {
            if (!empty($lab->nilai)) {
                echo '<form action="' . base_url() . 't_labhasil/update_action/' . $lab->noreg . '" method="post">';
            } else {
                echo '<form action="' . base_url() . 't_labhasil/create_action" method="post">';
            }
        ?>

            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $lab->nmlab ?></td>
                <!-- <td><?php echo $lab->deskripsi ?></td> -->
                <td><?php echo $lab->nilai_min . ' - ' . $lab->nilai_max ?></td>
                <td>
                    <input type="hidden" name="nobill" id="nobill" value="<?php echo $lab->labbill ?>">
                    <input type="hidden" name="noreg" id="noreg" value="<?php echo $lab->noreg ?>">
                    <input type="hidden" name="kdlab" id="kdlab" value="<?php echo $lab->kdlab ?>">
                    <input type="text" name="nilai" id="nilai" class="form-control" value="<?php echo $lab->nilai ?>">
                    <input type="hidden" name="tglinput" id="tglinput" value="<?php echo date('Y-m-d'); ?>" />
                    <input type="hidden" name="id_users" id="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
                </td>
                <td>
                    <?php if (!empty($lab->nilai)) {
                        if ($lab->nilai >= $lab->nilai_min && $lab->nilai <= $lab->nilai_max) {
                            echo $lab->nilai_normal;
                        } else {
                            echo $lab->nilai_tidak_normal;
                        }
                    } else {
                        echo '-';
                    }
                    ?>
                </td>
                <td>
                    <button type="submit" class="btn btn-sm btn-info waves-effect waves-themed"><i class="fal fa-save"></i></button>
                </td>
            </tr>
            </form>
        <?php $no++;
        } ?>
    </tbody>
</table>