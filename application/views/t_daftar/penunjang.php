<?php
$this->db->from('v_penunjang');
$this->db->where('noreg', $noreg);
$this->db->where('nobill', $nobill);
$this->db->group_by('kdpoli');
$query = $this->db->get();
if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        echo '<h2 class="fw-700 mt-2 mb-2"><i class="subheader-icon fal fa-list-alt"></i> ' . $row->poli . '</h2>';
        ///echo '<h3>' . $row->poli . '</h3>';
        $this->db->from('v_penunjang');
        $this->db->where('noreg', $noreg);
        $this->db->where('nobill', $nobill);
        $this->db->where('kdpoli', $row->kdpoli);
        $query2 = $this->db->get()->result();
        foreach ($query2 as $row2) {
            ?>
            <table class="table table-hover">
                <thead class="bg-info-500">
                    <th>Nama Pemeriksaan : <?php echo $row2->nmtarif ?></th>
                </thead>
            </table>

            <?php
                        if ($row->kdpoli == 5) { ?>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Jenis Pemeriksaan</th>
                            <th>Deskripsi</th>
                            <th>Ambang Nilai</th>
                            <th>Hasil Nilai</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                        $this->db->select('a.noreg,d.*,e.nobill as labbill,e.nilai');
                                        $this->db->from('t_billrajal a');
                                        $this->db->JOIN('m_tarif b', 'a.kdtarif=b.kdtarif', 'LEFT');
                                        $this->db->JOIN('m_labgroup c', 'b.kdtarif=c.kdtarif', 'LEFT');
                                        $this->db->JOIN('m_lab d', 'c.kdlab=d.kdlab', 'LEFT');
                                        $this->db->JOIN('t_labhasil e', 'e.kdlab=d.kdlab', 'LEFT');
                                        $this->db->where('a.noreg', $noreg);
                                        $this->db->where('a.nobill', $nobill);
                                        $this->db->where('a.kdtarif', $row2->kdtarif);
                                        $query3 = $this->db->get()->result();
                                        foreach ($query3 as $row3) {
                                            ?>
                            <tr>
                                <th scope="row"><?php echo $row3->nmlab ?></th>
                                <td><?php echo $row3->deskripsi ?></td>
                                <td><?php echo $row3->nilai_min . ' - ' . $row3->nilai_max ?></td>
                                <td><?php echo $row3->nilai ?></td>
                                <td>
                                    <?php if (!empty($row3->nilai)) {
                                                            if ($row3->nilai >= $row3->nilai_min && $row3->nilai <= $row3->nilai_max) {
                                                                echo $row3->nilai_normal;
                                                            } else {
                                                                echo $row3->nilai_tidak_normal;
                                                            }
                                                        } else {
                                                            echo '-';
                                                        }
                                                        ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>

<?php }
    }
} ?>