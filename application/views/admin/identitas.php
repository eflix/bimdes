	 <!-- Begin Page Content -->
	<div class="container-fluid">

	    <!-- Page Heading -->
	    <h1 class="h3 mb-4 text-gray-800"><?= $title . ' Akademik Desa'; ?></h1>
	    <input type="hidden" name="id" id="id" value="<?php echo $is['is_id']; ?>">

	    <div class="row">
                    	<div class="col-sm-6">
                    		<?= $this->session->flashdata('message'); ?>
                    	</div>
        </div>

	 	<form action="<?= base_url('admin/ubahIdentitas'); ?>" method="POST">
		 <div class="row">
				<div class="form-group col-sm-6">
	            	<label for="nama">Nama Bimbingan</label>
	              	<input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= $is['is_nama']; ?>">
	            </div>

	            <div class="form-group col-sm-6">
	            	<label for="email">Email</label>
	              	<input type="text" class="form-control form-control-sm" id="email" name="email" value="<?= $is['is_email']; ?>">
	            </div>

	            <div class="form-group col-sm-6">
	            	<label for="telp">Telepon</label>
	              	<input type="text" class="form-control form-control-sm" id="telp" name="telp" value="<?= $is['is_no_telp']; ?>">
	            </div>

	            <div class="form-group col-sm-6">
	            	<label for="alamat">Alamat</label>
	              	<textarea type="text" class="form-control form-control-sm" id="alamat" name="alamat"><?= $is['is_alamat']; ?></textarea>
	            </div>

				<div class="form-group col-sm-6">
				    <input class="btn btn-primary btn-sm" type='submit' name='submit' value='Ubah Identitas'>
				</div>
				              
			</div>
		 </form>          

	 </div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->