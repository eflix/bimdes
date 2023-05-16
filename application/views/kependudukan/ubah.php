<!-- Begin Page Content --> 
  <div class="container-fluid">

      <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

         <form action="<?= base_url('kependudukan/ubahPenduduk'); ?>" method="post">
      <div class="row">
      <div class="col-sm-6">
        <?= form_error('message', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" class="form-control" value="<?php echo $penduduk['dp_nik']; ?>">
                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?> 
              </div>
              <div class="form-group">
                <label for="nokk">No KK</label>
                <input type="text" id="nokk" name="nokk" class="form-control" value="<?php echo $penduduk['dp_no_kk']; ?>">
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $penduduk['dp_nama']; ?>">
              </div>
              <div class="form-group">
                <label for="tempatLahir">Tempat Lahir</label>
                <input type="text" id="tempatLahir" name="tempatLahir" class="form-control" value="<?php echo $penduduk['dp_tempat_lahir']; ?>">
              </div>
              <div class="form-group">
                <label for="tglLahir">Tanggal Lahir</label>
                <input type="date" id="tglLahir" name="tglLahir" class="form-control" value="<?php echo $penduduk['dp_tanggal_lahir']; ?>">
                
              </div>

      </div>

      <div class="col-sm-6">
        <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-control" id="gender" name="gender">
                  <?php  
                    if($penduduk['dp_gender']=='Laki - Laki'){
                      echo  '<option selected>Laki - Laki</option>';
                      echo  '<option>Perempuan</option>';
                    } else if ($penduduk['dp_gender']=='Perempuan'){
                      echo  '<option>Laki - Laki</option>';
                      echo  '<option selected>Perempuan</option>';
                    } else {
                      echo  '<option>Laki - Laki</option>';
                      echo  '<option>Perempuan</option>';
                    }
                  ?>
                </select>
              </div>
        <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" id="agama" name="agama" class="form-control" value="<?php echo $penduduk['dp_agama']; ?>">
              </div>
              <div class="form-group">
                <label for="telp">Status Perkawinan</label>
                <select class="form-control" id="statusPerkawinan" name="statusPerkawinan">
                  <?php  
                    if($penduduk['dp_status_perkawinan']=='Kawin'){
                      echo '<option>-- pilih status perkawinan --</option>';
                      echo  '<option selected>Kawin</option>';
                      echo  '<option>Belum Kawin</option>';
                    } else if ($penduduk['dp_status_perkawinan']=='Belum Kawin'){
                      echo '<option>-- pilih status perkawinan --</option>';
                      echo  '<option>Kawin</option>';
                      echo  '<option selected>Belum Kawin</option>';
                    } else {
                      echo '<option>-- pilih status perkawinan --</option>';
                      echo  '<option>Kawin</option>';
                      echo  '<option>Belum Kawin</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" value="<?php echo $penduduk['dp_pekerjaan']; ?>">
              </div>

              <div class="form-group">
                <label for="telp">Kewarganegaraan</label>
                <select class="form-control" id="kewarganegaraan" name="kewarganegaraan">
                  <?php  
                    if($penduduk['dp_kewarganegaraan']=='wni'){
                      echo  '<option selected>wni</option>';
                      echo  '<option>wna</option>';
                    } else if ($penduduk['dp_kewarganegaraan']=='wna'){
                      echo  '<option>wni</option>';
                      echo  '<option selected>wna</option>';
                    } else {
                      echo  '<option>wni</option>';
                      echo  '<option>wna</option>';
                    }
                  ?>
                </select>
      </div>
    </div>
  </div>

    <div class="row mb-4">
      <div class="col-sm-4 form-group">
      <label for="alamat">Alamat</label>
                <textarea type="textarea" id="alamat" name="alamat" class="form-control"><?php echo $penduduk['dp_alamat']; ?></textarea>
            </div>
      <div class="col-sm-4 form-group">
        <label for="desa">Desa</label>
              <input type="text" id="desa" name="desa" class="form-control" value="<?php echo $penduduk['dp_desa']; ?>">
      </div>
      <div class="col-sm-4 form-group">
        <label for="kelurahan">Kelurahan</label>
              <input type="text" id="kelurahan" name="kelurahan" class="form-control" value="<?php echo $penduduk['dp_kelurahan']; ?>">
      </div>
      <div class="col-sm-4 form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="<?php echo $penduduk['dp_kecamatan']; ?>">
                </div>

                <div class="col-sm-4 form-group">
                  <label for="kabupaten">Kabupaten</label>
                  <input type="text" id="kabupaten" name="kabupaten" class="form-control" value="<?php echo $penduduk['dp_kabupaten']; ?>">
                </div>
                <div class="col-sm-4 form-group">
                  <label for="provinsi">Provinsi</label>
                  <input type="text" id="provinsi" name="provinsi" class="form-control" value="<?php echo $penduduk['dp_provinsi']; ?>">
                </div>

    </div>

    <div class="row">
      <div class="col-sm-12">
      <!-- <label for="password">Password(Untuk Login Aplikasi)</label> -->
        <label class="checkbox-inline">
          <!-- <input type="checkbox" id="cb1" name="cb1">  -->
          Akun Log In ( <?php echo $flagUser; ?> )
        </label>
                
      </div>
      <div class="col-sm-4 form-group">
      <label for="password">Password(Untuk Login Aplikasi)</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="masukan password">
      <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="col-sm-4 form-group">
        <label for="password">Ulangi Password</label>
              <input type="password" id="password1" name="password1" class="form-control" placeholder="ulangi password">
        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

    </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('kependudukan'); ?>" class="btn btn-danger">Kembali</a>
            </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content