  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <?= $this->session->flashdata('message'); ?>

              <?php echo @$error; ?> 
              <?php echo form_open_multipart('kuis/upload');?>

                <!-- <div class="preview" style="margin-bottom:20px;"></div>
                  
                      <div class="progress" style="display:none">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"> 0% </div>
                        </div> -->
                        
                  <div class="row">

                            <div class="form-group col-sm-2">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category">
                                      <option>UMUM</option>
                                      <option>KHUSUS</option>
                                      <option>SD</option>
                                      <option>SMP</option>
                                      <option>SMA</option>
                                      <option>SMK</option>
                                    </select>
                            </div>

                            <div class="form-group col-sm-2">
                                    <label for="jenis">Jenis</label>
                                    <select class="form-control" id="jenis" name="jenis">
                                      <option>video</option>
                                      <option>dokumen</option>
                                    </select>
                            </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="modul">Modul</label>
                            <input type="text" class="form-control form-control-sm" id="modul" name="modul" list="listModul">

                            <datalist id="listModul">
                              <?php foreach ($modul as $m) : ?>
                                <option value="<?= $m['md_modul'] ?>"><?= $m['md_id'] . '-' . $m['md_modul']; ?></option>
                              <?php endforeach; ?>
                            </datalist>
                            </div>
                        </div>
                  </div>

                  <div class="row">
                          <div class="form-group col-sm-5">
                                <label for="file">Dokumen / Video</label>
                            <input class="form-control" type='file' name="profile_pic" id="profile_pic" size='20' style="width: 28em; height: 5em;" value="drag & drop">
                                <h7>File tipe : pdf/mp4</h7>
                          </div>

                          <div class="form-group col-sm-5">
                                <label for="thumbnail">Thumbnail</label>
                            <input class="form-control" type='file' name="thumbnail" id="thumbnail" size='20' style="width: 28em; height: 5em;" value="drag & drop">
                                <h7>File tipe : jpg/png</h7>
                          </div>

                          <div class="form-group col-sm-2">
                                <input class="btn btn-primary btn-sm upload-image" type='submit' name='submit' value='Tambah'>
                              </div>
                        </div>

                      <div class="row">
                          <div class="col sm-2">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="10" rows="3"></textarea>
                          </div>
                      </div>
                  </div>

              </form>

              <div class="row mt-3">
			<div class="col-md-6">
				<form action="" method="post">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Cari data Materi.." name="keyword">
						<div class="input-group-append">
							<button type="submit" class="btn btn-primary">Cari</button>
						</div>
					</div>
				</form>
			</div>
		</div>
                    <table class="table table-hover table-responsive" style="font-size: 12px;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Modul</th>
                    <th scope="col">File</th>
                    <th scope="col">Video Thumbnail</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($materi as $mt) : ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $mt['mt_category']; ?></td>
                      <td><?= $mt['mt_jenis']; ?></td>
                      <td><?= $mt['mt_modul']; ?></td>
                      <td><?= $mt['mt_file']; ?></td>
                      <td><?= $mt['mt_video_tumb']; ?></td>
                      <td>
                      <a class="badge badge-warning" href="<?= base_url('kuis/ubahMateri/') . $mt['mt_id']; ?>">ubah</a>
                        <a class="badge badge-danger" href="<?= base_url('kuis/hapusMateri/') . $mt['mt_id']. '/'. $mt['mt_jenis'] . '/'.$mt['mt_modul'] .'/'.$mt['mt_file']; ?>">hapus</a>
                        <a class="badge badge-success" href="<?= base_url('./assets/materi/') . $mt['mt_jenis'] . '/' . $mt['mt_modul'] . '/' . $mt['mt_file']; ?>" target="_blank">lihat</a>
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
        </div>   -->

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
          <button type="submit" class="btn btn-primary upload-image">Tambah</button>
        </div>
      <!-- </form> -->
    </div>
  </div>
</div>
