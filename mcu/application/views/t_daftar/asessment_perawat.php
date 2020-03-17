<div class="col-lg-6 col-xl-3 order-lg-2 order-xl-3">
    <!-- add : -->
    <!-- rating -->
    <div class="card mb-g">
        <div class="row row-grid no-gutters">
            <div class="col-12">
                <div class="p-3">
                    <h2 class="mb-0 fs-xl">
                        ASESSMENT PERAWAT
                    </h2>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <?php
                    $this->db->select('*');
                    $this->db->from('t_asessment');
                    $this->db->where('noreg', $noreg);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $row) {
                            $bb = $row->bb;
                            $tb = $row->tb;
                            $sb = $row->sb;
                            $sistole = $row->sistole;
                            $diastole = $row->diastole;
                            $sb = $row->sb;
                            $nadi = $row->nadi;
                            $napas = $row->napas;
                            $ket = $row->keterangan;
                        }
                    } else {
                        $bb = '';
                        $tb = '';
                        $sb = '';
                        $sistole = '';
                        $diastole = '';
                        $sb = '';
                        $nadi = '';
                        $napas = '';
                        $ket = '';
                    }
                    //print_r($this->db->last_query());
                    ?>
                    <div class="col-6">
                        <div class="p-3">
                            <div class="form-group">
                                <label class="form-label" for="basic-url">Berat Badan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $bb; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3">
                            <div class="form-group">
                                <label class="form-label" for="basic-url">Tinggi Badan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $tb ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3">
                            <div class="form-group">
                                <label class="form-label" for="basic-url">Suhu Badan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $sb ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">C</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3">
                            <div class="form-group">
                                <label class="form-label" for="basic-url">Sistole</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $sistole ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3">
                            <div class="form-group">
                                <label class="form-label" for="basic-url">Diastole</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $diastole ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3">
                            <div class="form-group">
                                <label class="form-label" for="basic-url">Nadi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $nadi ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3">
                            <div class="form-group">
                                <label class="form-label" for="basic-url">Napas</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $napas ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3">
                            <div class="form-group">
                                <label class="form-label" for="example-textarea">Keterangan</label>
                                <textarea class="form-control" id="example-textarea" rows="3"><?php echo $ket ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="p-3 text-center">
                    <a href="javascript:void(0);" class="btn-link font-weight-bold">View all</a>
                </div>
            </div>
        </div>
    </div>
</div>