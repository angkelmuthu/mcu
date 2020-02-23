<?php
$this->db->from('t_asessment');
$this->db->where('noreg', $noreg);
$sqlvital = $this->db->get()->result();
foreach ($sqlvital as $vital) {
?>
    <table class="table table-bordered m-0">
        <tbody>
            <tr>
                <td><strong>Berat Badan</strong></td>
                <td><?php echo $vital->bb; ?> <i>Kg</i></td>
                <td><strong>Tinggi Badan</strong></td>
                <td><?php echo $vital->tb; ?> <i>cm</i></td>
                <td><strong>Suhu Badan</strong></td>
                <td><?php echo $vital->sb; ?> <i>C</i></td>
            </tr>
            <tr>
                <td><strong>Sistole</strong></td>
                <td><?php echo $vital->sistole; ?> <i>mmHg</i></td>
                <td><strong>Diastole</strong></td>
                <td><?php echo $vital->diastole; ?> <i>mmHg</i></td>
                <td><strong>Nadi</strong></td>
                <td><?php echo $vital->nadi; ?> <i>/menit</i></td>
            </tr>
            <tr>
                <td><strong>Nafas</strong></td>
                <td><?php echo $vital->napas; ?></td>
                <td><strong>Keterangan</strong></td>
                <td colspan="3"><?php echo $vital->keterangan; ?></td>
            </tr>
            <tr>
                <td colspan="8"><i>Created : <?php echo $vital->id_users; ?> ( <?php echo tanggal($vital->tglinput) ?> )</i></td>
            </tr>
        </tbody>
    </table>
<?php } ?>
<br>
<div class="accordion" id="js_demo_accordion-2">
    <?php
    $this->db->from('t_asessment');
    $this->db->where('nomr', $nomr);
    $getby_nomr = $this->db->get()->result();
    foreach ($getby_nomr as $getnomr) {
    ?>
        <div class="card">
            <div class="card-header">
                <a href="javascript:void(0);" class="card-title collapsed" data-toggle="collapse" data-target="#js_demo_accordion-<?php echo $getnomr->noreg ?>" aria-expanded="false">
                    <?php echo tanggal($getnomr->tglinput) ?>
                </a>
            </div>
            <div id="js_demo_accordion-<?php echo $getnomr->noreg ?>" class="collapse" data-parent="#js_demo_accordion-2">
                <div class="card-body">
                    <?php
                    $this->db->from('t_asessment');
                    $this->db->where('noreg', $getnomr->noreg);
                    $sqlvital2 = $this->db->get()->result();
                    foreach ($sqlvital2 as $vital2) {
                    ?>
                        <table class="table table-bordered m-0">
                            <tbody>
                                <tr>
                                    <td><strong>Berat Badan</strong></td>
                                    <td><?php echo $vital2->bb; ?> <i>Kg</i></td>
                                    <td><strong>Tinggi Badan</strong></td>
                                    <td><?php echo $vital2->tb; ?> <i>cm</i></td>
                                    <td><strong>Suhu Badan</strong></td>
                                    <td><?php echo $vital2->sb; ?> <i>C</i></td>
                                </tr>
                                <tr>
                                    <td><strong>Sistole</strong></td>
                                    <td><?php echo $vital2->sistole; ?> <i>mmHg</i></td>
                                    <td><strong>Diastole</strong></td>
                                    <td><?php echo $vital2->diastole; ?> <i>mmHg</i></td>
                                    <td><strong>Nadi</strong></td>
                                    <td><?php echo $vital2->nadi; ?> <i>/menit</i></td>
                                </tr>
                                <tr>
                                    <td><strong>Nafas</strong></td>
                                    <td><?php echo $vital2->napas; ?></td>
                                    <td><strong>Keterangan</strong></td>
                                    <td colspan="3"><?php echo $vital2->keterangan; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="8"><i>Created : <?php echo $vital2->id_users; ?> ( <?php echo tanggal($vital2->tglinput) ?> )</i></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>