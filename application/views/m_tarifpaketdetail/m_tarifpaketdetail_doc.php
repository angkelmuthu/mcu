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
        <h2>M_tarifpaketdetail List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kdtarifpaket</th>
		<th>Kdtarif</th>
		<th>Tglinput</th>
		<th>Id Users</th>
		
            </tr><?php
            foreach ($m_tarifpaketdetail_data as $m_tarifpaketdetail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $m_tarifpaketdetail->kdtarifpaket ?></td>
		      <td><?php echo $m_tarifpaketdetail->kdtarif ?></td>
		      <td><?php echo $m_tarifpaketdetail->tglinput ?></td>
		      <td><?php echo $m_tarifpaketdetail->id_users ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>