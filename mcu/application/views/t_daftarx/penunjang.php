<?php
$this->db->from('v_penunjang');
$this->db->where('noreg', $noreg);
$this->db->where('nobill', $nobill);
$this->db->group_by('kdpoli');
$query = $this->db->get();
if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        echo '
            <table class="table table-hover mt-0 mb-2">
                <thead class="bg-info-500">
                    <td><h4 class="fw-700 m-0"><i class="subheader-icon fal fa-list-alt"></i> ' . $row->poli . '</h4></td>
                </thead>
            </table>';
        //echo '<h2 class="fw-700 mt-2 mb-2"><i class="subheader-icon fal fa-list-alt"></i> ' . $row->poli . '</h2>';
        $this->db->from('v_penunjang');
        $this->db->where('noreg', $noreg);
        $this->db->where('nobill', $nobill);
        $this->db->where('kdpoli', $row->kdpoli);
        $query2 = $this->db->get()->result();
        foreach ($query2 as $row2) {
?>

            <?php
            if ($row->kdpoli == 5) { ?>
                <h6 class="fw-700 mt-2 mb-2"><?php echo $row2->nmtarif ?></h6>
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
                        $this->db->JOIN('t_labhasil e', 'd.kdlab=e.kdlab', 'LEFT');
                        $this->db->where('a.noreg', $noreg);
                        $this->db->where('a.nobill', $nobill);
                        $this->db->where('a.kdtarif', $row2->kdtarif);
                        $query3 = $this->db->get()->result();
                        //echo $this->db->last_query();
                        foreach ($query3 as $row3) {
                        ?>
                            <tr>
                                <th scope="row">- <?php echo $row3->nmlab ?></th>
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
            <?php } elseif ($row->kdpoli == 4) {
                $this->db->select('*');
                $this->db->from('t_radhasil');
                $this->db->where('nobill', $nobill);
                $this->db->where('noreg', $noreg);
                $this->db->where('kdtarif', $row2->kdtarif);
                $result = $this->db->get()->result();
            ?>

                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Nama Periksaan</th>
                            <th>Hasil</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $hasil) { ?>
                            <tr>
                                <td><?php echo $row2->nmtarif ?></td>
                                <td><?php echo $hasil->hasil ?></td>
                                <td>
                                    <?php
                                    $radno = 1;
                                    $this->db->select('id,file_name,uploaded_on');
                                    $this->db->from('t_rad_file');
                                    $this->db->where('nobill', $nobill);
                                    $this->db->where('noreg', $noreg);
                                    $this->db->where('kdtarif', $row2->kdtarif);
                                    $this->db->order_by('uploaded_on', 'desc');
                                    $query = $this->db->get();
                                    //echo $this->db->last_query();
                                    $result = $query->result_array();
                                    if (!empty($result)) { ?>
                                        <div class="image-set">
                                            <?php foreach ($result as $file) { ?>
                                                <a data-magnify="gallery" data-caption="<?php echo $radno ?>" class="btn btn-sm btn-primary" href="<?php echo base_url('assets/file_radiologi/' . $file['file_name']); ?>">
                                                    file-<?php echo $radno ?>
                                                </a>
                                            <?php $radno++;
                                            } ?>
                                        </div>
                                    <?php } else {
                                    } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
<?php
            }
        }
    }
}
?>