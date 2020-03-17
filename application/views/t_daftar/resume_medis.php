<?php
$this->db->from('t_asessment');
$this->db->where('noreg', $noreg);
$this->db->where('nobill', $nobill);
$query = $this->db->get();
if ($query->num_rows() > 0) {
    foreach ($query->result() as $datax) {
        $alergi = $datax->alergi;
        $keluhan = $datax->keluhan;
        $r_penyakit = $datax->r_penyakit;
        $instruksi = $datax->instruksi;
    }
} else {
    $idsoap = '';
    $alergi = '';
    $keluhan = '';
    $r_penyakit = '';
    $instruksi = '';
}
?>
<div class="col-12">
    <input type="hidden" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" />
    <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
    <div class="row">
        <div class="col-3 mb-3">
            <label class="form-label" for="example-textarea">RIWAYAT ALERGI</label>
        </div>
        <div class="col-9 mb-3">
            <?php echo $alergi ?>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label" for="example-textarea">KELUHAN UTAMA</label>
        </div>
        <div class="col-9 mb-3">
            <?php echo $keluhan ?>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label" for="example-textarea">RINGKASAN RIWAYAT PENYAKIT</label>
        </div>
        <div class="col-9 mb-3">
            <?php echo $r_penyakit ?>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label" for="example-textarea">PEMERIKSAAN FISIK</label>
        </div>
        <div class="col-9 mb-3">
            <?php
            $this->db->from('t_vital');
            $this->db->where('noreg', $noreg);
            $sqlvital = $this->db->get()->result();
            foreach ($sqlvital as $vital) {
                ?>
                <table class="table table-bordered m-0">
                    <tbody>
                        <tr>
                            <td>Berat Badan</td>
                            <td><?php echo $vital->bb; ?> Kg</td>
                            <td>Tinggi Badan</td>
                            <td><?php echo $vital->tb; ?> cm</td>
                            <td>Suhu Badan</td>
                            <td><?php echo $vital->sb; ?> C</td>
                        </tr>
                        <tr>
                            <td>Sistole</td>
                            <td><?php echo $vital->sistole; ?> mmHg</td>
                            <td>Diastole</td>
                            <td><?php echo $vital->diastole; ?> mmHg</td>
                            <td>Nadi</td>
                            <td><?php echo $vital->nadi; ?> /menit</td>
                        </tr>
                        <tr>
                            <td>Nafas</td>
                            <td><?php echo $vital->napas; ?></td>
                            <td>Keterangan</td>
                            <td colspan="3"><?php echo $vital->keterangan; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label" for="example-textarea">PEMERIKSAAN PENUNJANG</label>
        </div>
        <div class="col-9 mb-3">
            <?php
            $this->db->from('v_penunjang');
            $this->db->where('noreg', $noreg);
            $query2 = $this->db->get()->result();
            foreach ($query2 as $row2) {
                echo $row2->nmtarif . ', ';
            }
            ?>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label" for="example-textarea">INSTRUKSI</label>
        </div>
        <div class="col-9 mb-3">
            <?php echo $instruksi ?>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label" for="example-textarea">DIAGNOSA</label>
        </div>
        <div class="col-9 mb-3">
            <?php
            $this->db->from('t_icd a');
            $this->db->JOIN('m_icd10 b', 'a.code=b.code', 'LEFT');
            $this->db->where('a.noreg', $noreg);
            $this->db->where('a.kddokter', $kddokter);
            $this->db->where('a.nobill', $nobill);
            $this->db->where('a.flag', 'icd10');
            $sqlicd10 = $this->db->get()->result();
            foreach ($sqlicd10 as $icd10) {
                echo '<li>' . $icd10->description . ' (' . $icd10->code . ')</li>';
            } ?>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label" for="example-textarea">TERAPI DAN ATAU TINDAKAN</label>
        </div>
        <div class="col-9 mb-3">
            <?php
            $this->db->from('t_icd a');
            $this->db->JOIN('m_icd10 b', 'a.code=b.code', 'LEFT');
            $this->db->where('a.noreg', $noreg);
            $this->db->where('a.kddokter', $kddokter);
            $this->db->where('a.nobill', $nobill);
            $this->db->where('a.flag', 'icd9');
            $sqlicd10 = $this->db->get()->result();
            foreach ($sqlicd10 as $icd10) {
                echo '<li>' . $icd10->description . ' (' . $icd10->code . ')</li>';
            } ?>
        </div>
    </div>
</div>