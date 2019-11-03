<?php
$this->db->select('*');
$this->db->from('t_emr');
$this->db->where('noreg', $noreg);
$query = $this->db->get();
if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        $idemr = $row->idemr;
        $action = 't_emr/update_action';
        $subjek = $row->subjek;
        $objek = $row->objek;
        $asessment = $row->asessment;
        $plann = $row->plann;
    }
} else {
    $idemr = '';
    $action = 't_emr/create_action';
    $subjek = '';
    $objek = '';
    $asessment = '';
    $plann = '';
}
//print_r($this->db->last_query());
?>
<form action="<?php echo base_url() . $action ?>" method="post">
    <div class="col-12">
        <input type="hidden" name="tglinput" value="<?php echo date('Y-m-d H:i:s'); ?>" />
        <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
        <input type="hidden" name="noreg" value="<?php echo $noreg ?>">
        <input type="hidden" name="idreg" value="<?php echo $idreg ?>">
        <input type="hidden" name="idemr" value="<?php echo $idemr ?>">
        <div class="form-group">
            <label class="form-label" for="example-textarea">Subjek</label>
            <textarea class="form-control" name="subjek" id="example-textarea" rows="2"><?php echo $subjek; ?></textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="example-textarea">Objek</label>
            <textarea class="form-control" name="objek" id="example-textarea" rows="2"><?php echo $objek; ?></textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="example-textarea">Asessment</label>
            <textarea class="form-control" name="asessment" id="example-textarea" rows="2"><?php echo $asessment; ?></textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="example-textarea">Planning</label>
            <textarea class="form-control" name="plann" id="example-textarea" rows="2"><?php echo $plann; ?></textarea>
        </div>
        <div class="p-3 text-center">
            <button type="submit" class="btn btn-sm btn-primary font-weight-bold">Simpan</button>
        </div>
    </div>
</form>