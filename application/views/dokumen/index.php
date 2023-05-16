  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    	<div class="row col-sm-6">
                    		<?= $this->session->flashdata('message'); ?>
                    	</div>
                    	<?php echo @$error; ?> 
					    <?php echo form_open_multipart('kependudukan/upload');?>
					    <div class="row">

							    <div class="form-group col-sm-4">
							    <input type="hidden" name="nik" id="nik" value="<?php echo $dp['dp_nik']; ?>">
				                <label for="telp">Jenis Dokumen</label>
				                <select class="form-control" id="jenisSurat" name="jenisSurat">
				                  <option>-- pilih jenis dokumen --</option>
				                  <option>Surat Pengantar RT/RW</option>
				                  <option>Fotokopi KK</option>
				                  <option>Fotokopi KTP</option>
				                  <option>Fotokopi Surat Nikah/Akta Nikah/Kutipan Akta Perkawinan</option>
				                  <option>Fotokopi Akta Kelahiran/Surat Kelahiran bagi keluarga yang mempunyai anak</option>
				                  <option>Surat Pindah Datang dari tempat asal</option>
				                  <option>Surat Keterangan Kematian dari Rumah Sakit Bersalin Puskesmas, atau visum Dokter</option>
				                  <option>Surat Keterangan Cerai</option>
				                  <option>Fotokopi Ijasah Terakhir</option>
				                </select>
				              </div>

				              <div class="form-group col-sm-4">
				              	<input class="btn btn-primary btn-sm" type='submit' name='submit' value='Tambah Dokumen'>
				              </div>
				              
				        </div>
				        <div class="row">
				        	<div class="form-group col-sm-4">

					     <input class="form-control" type='file' name="profile_pic" id="profile_pic" size='20'>
						
					    </div>
				        </div>
					    


					    </form>

                    <div class="row">
                    	<div class="col-sm-1">
                    		<h4>Nama</h4>
                    		<h4>NIK</h4>
                    	</div>
                    	<div class="col-sm-6">
                    		<h4><?php echo ': '. $dp['dp_nama']; ?></h4>
                    		<h4><?php echo ': '. $dp['dp_nik']; ?></h4>
                    	</div>
                    </div>


                    <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Jenis Dokumen</th>
				            <th scope="col">Nama</th>
				            <th scope="col">Dokumen</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $i = 1;
					          foreach ($dokumen as $d) : ?>
					          <tr>
					            <td><?= $i ?></td>
					            <td><?= $d['dd_jenis']; ?></td>
					            <td></td>
					            <td><?= $d['dd_dokumen']; ?></td>
					            <td>
					              <a class="badge badge-success" href="<?= base_url('alda-admin/blog/edit/') . $d['dd_id']; ?>">edit</a>
					              <a class="badge badge-danger" href="<?= base_url('kependudukan/hapusDokumen/') . $d['dd_id'].'/'.$dp['dp_nik']; ?>">hapus</a>
					            </td>

					          </tr>
				        	<?php $i++; endforeach; ?>  
				          
				        </tbody>
				      </table>  
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Tambah Dokumen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	

	      <div class="modal-body">

	      	<!-- <div class="form-group">
                <label for="telp">Jenis Dokumen</label>
                <select class="form-control" id="jenisSurat" name="jenisSurat">
                  <option>-- pilih jenis dokumen --</option>
                  <option>Surat Pengantar RT/RW</option>
                  <option>Fotokopi KK</option>
                  <option>Fotokopi KTP</option>
                </select>
              </div> -->
	        	<!-- <div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="image">
							<label class="custom-file-label" for="image" >Pilih Dokumen</label>
				</div>	 -->

				<!-- <div class="col-sm-10">
					<div class="col-sm-9">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="image">
							<label class="custom-file-label" for="image" >Choose file</label>
						</div>	
					</div> -->
				</div>
			<!-- </div> -->

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Tambah</button>
	      </div>
      <!-- </form> -->
    </div>
  </div>
</div>