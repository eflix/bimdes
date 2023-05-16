  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title . ' Sistem Bimbel Online Desa'; ?></h1>

<?php echo @$error; ?> 
        <?php echo form_open_multipart('android/ubahBerita/'.$berita['bt_id']);?>
            <div class="row">

                <div class="col-sm-12">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                        <input type="text" class="form-control form-control-sm" id="judul" name="judul" value="<?= $berita['bt_judul']; ?>">

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                        <label for="modul">Konten</label>
                    <textarea class="form-control" name="konten" id="konten" rows="5"><?= $berita['bt_konten']; ?></textarea>
                        </div>
                    </div>
                      
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">

                    <input class="form-control" type='file' name="profile_pic" id="profile_pic" size='20' style="width: 34em; height: 5em;">
                    </div>
                    <div class="form-group col-sm-2">
                        <input class="btn btn-primary btn-sm" type='submit' name='submit' value='Simpan'>
                    </div>
</div>
        </form>
           

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->