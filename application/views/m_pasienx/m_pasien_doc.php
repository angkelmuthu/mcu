<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>M_pasien List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Tgllhr</th>
		<th>Alamat</th>
		<th>Kodepos</th>
		<th>Kdklmn</th>
		<th>Kdkawin</th>
		<th>Hp</th>
		<th>Foto</th>
		<th>Tglinput</th>
		<th>Id Users</th>
		
            </tr><?php
            foreach ($m_pasien_data as $m_pasien)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $m_pasien->nik ?></td>
		      <td><?php echo $m_pasien->nama ?></td>
		      <td><?php echo $m_pasien->tgllhr ?></td>
		      <td><?php echo $m_pasien->alamat ?></td>
		      <td><?php echo $m_pasien->kodepos ?></td>
		      <td><?php echo $m_pasien->kdklmn ?></td>
		      <td><?php echo $m_pasien->kdkawin ?></td>
		      <td><?php echo $m_pasien->hp ?></td>
		      <td><?php echo $m_pasien->foto ?></td>
		      <td><?php echo $m_pasien->tglinput ?></td>
		      <td><?php echo $m_pasien->id_users ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>