<!-- Begin Page Content --> 
  <div class="container-fluid">

      <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

         <form action="<?= base_url('kependudukan/tambah'); ?>" method="post">
      <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" class="form-control" placeholder="masukan nik">
                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?> 
              </div>
              <div class="form-group">
                <label for="nokk">No KK</label>
                <input type="text" id="nokk" name="nokk" class="form-control" placeholder="masukan No KK">
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="masukan Nama">
         
              </div>
              <div class="form-group">
                <label for="tempatLahir">Tempat Lahir</label>
                <input type="text" id="tempatLahir" name="tempatLahir" class="form-control" placeholder="masukan Tempat Lahir">
              </div>
              <div class="form-group">
                <label for="tglLahir">Tanggal Lahir</label>
                <input type="date" id="tglLahir" name="tglLahir" class="form-control">
                
              </div>

      </div>

      <div class="col-sm-6">
        <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-control" id="gender" name="gender">
                  <option>Laki - Laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
        <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" id="agama" name="agama" class="form-control" placeholder="masukan Agama">
              </div>
              <div class="form-group">
                <label for="telp">Status Perkawinan</label>
                <select class="form-control" id="statusPerkawinan" name="statusPerkawinan">
                  <option>-- pilih status perkawinan --</option>
                  <option>Kawin</option>
                  <option>Belum Kawin</option>
                </select>
              </div>
              <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" placeholder="masukan Pekerjaan">
              </div>

              <div class="form-group">
                <label for="telp">Kewarganegaraan</label>
                <select class="form-control" id="kewarganegaraan" name="kewarganegaraan">
                  <option>wni</option>
                  <option>wna</option>
                </select>
      </div>
    </div>
  </div>

    <div class="row mb-4">
      <div class="col-sm-4 form-group">
      <label for="alamat">Alamat</label>
                <textarea type="textarea" id="alamat" name="alamat" class="form-control" placeholder="masukan Alamat"></textarea>
            </div>
      <div class="col-sm-4 form-group">
        <label for="desa">Desa</label>
              <input type="text" id="desa" name="desa" class="form-control" placeholder="masukan Desa">
      </div>
      <div class="col-sm-4 form-group">
        <label for="kelurahan">Kelurahan</label>
              <input type="text" id="kelurahan" name="kelurahan" class="form-control" placeholder="masukan Kelurahan">
      </div>
      <div class="col-sm-4 form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="masukan Kecamatan">
                </div>

                <div class="col-sm-4 form-group">
                  <label for="kabupaten">Kabupaten</label>
                  <input type="text" id="kabupaten" name="kabupaten" class="form-control" placeholder="masukan Kabupaten">
                </div>

        <div class="col-sm-4 form-group">
                  <label for="provinsi">Provinsi</label>
                  <input type="text" id="kabupaten" name="provinsi" class="form-control" placeholder="masukan provinsi">
                </div>

    </div>

    <div class="row">
      <div class="col-sm-12">
      <!-- <label for="password">Password(Untuk Login Aplikasi)</label> -->
        <label class="checkbox-inline">
          <!-- <input type="checkbox" id="cb1" name="cb1">  -->
          Akun Log In
        </label>
                
      </div>
      <div class="col-sm-4 form-group">
      <label for="password">Password(Untuk Login Aplikasi)</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="masukan password">
      </div>
      <div class="col-sm-4 form-group">
        <label for="password1">Ulangi Password</label>
              <input type="password" id="password1" name="password1" class="form-control" placeholder="ulangi password">
      </div>

      <div class="col-sm-4 form-group">
        <label for="staff">Staff / Admin</label>
              <input type="text" id="staff" name="staff" class="form-control" value="<?= $nama; ?>">
      </div>

    </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('kependudukan'); ?>" class="btn btn-danger">Kembali</a>
            </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content