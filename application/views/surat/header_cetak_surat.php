<!-- Begin Page Content -->
<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> 
         <h3 class="h3 mb-4 text-gray-800"><?php if (isset($ps['ps_ds_layanan'])) {echo $ps['ps_ds_layanan'];} ?></h3>  

        <form action="<?= base_url('surat/cetakSurat/'); ?>" method="post">
        	<input type="hidden" name="id" id="id" value="<?php if (isset($id)) {echo $id;} ?>">

           <!-- <div class="row"> -->
            


           