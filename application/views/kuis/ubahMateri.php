  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<h5 class="h3 mb-4 text-gray-800">Ubah Materi</h5>

<?php echo @$error; ?> 
                  <?php echo form_open_multipart('kuis/ubahMateri/'.$materi['mt_id']);?>
                      <div class="row">

                              <div class="form-group col-sm-2">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category">
                                      <?php 
                                            echo '<option>'.$materi['mt_category'].'</option>';
                                            echo '<option>UMUM</option>';
                                            echo '<option>KHUSUS</option>';
                                            echo '<option>SD</option>';
                                            echo '<option>SMP</option>';
                                            echo '<option>SMA</option>';
                                            echo '<option>SMK</option>';
                                      ?>
                                    </select>
                                  </div>

                                  <div class="form-group col-sm-2">
                                    <label for="jenis">Jenis</label>
                                    <select class="form-control" id="jenis" name="jenis">

                                    <?php if ($materi['mt_jenis'] == 'video') {
                                            echo '<option selected>video</option>';
                                            echo '<option>dokumen</option>';
                                        } else if ($materi['mt_jenis'] == 'dokumen') {
                                            echo '<option>video</option>';
                                            echo '<option selected>dokumen</option>';
                                        }
                                            ?>

                                      <option>video</option>
                                      <option>dokumen</option>
                                    </select>
                                  </div>

                                  <div class="col-sm-6">
                          <div class="form-group">
                            <label for="modul">Modul</label>
                          <input type="text" class="form-control form-control-sm" id="modul" name="modul" list="listModul" value="<?= $materi['mt_modul']; ?>">

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
                                <input class="btn btn-primary btn-sm" type='submit' name='submit' value='Simpan'>
                              </div>
                        </div>

                        <div class="row">
                          <div class="col sm-2">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="10" rows="3"><?= $materi['mt_notes']; ?></textarea>
                          </div>
                        </div>
              </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->