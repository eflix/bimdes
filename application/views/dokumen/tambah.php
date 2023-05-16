<!-- Begin Page Content --> 
  <div class="container-fluid">

      <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

         <form action="<?= base_url('Surat/tambah'); ?>" method="post">
          <div class="row">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="nik">Nama / NIK</label>
              <input type="text" class="form-control form-control-sm" id="nik" name="nik" list="listNik">

              <datalist id="listNik">
                <?php foreach ($listNama as $ln) : ?>
                  <option value="<?= $ln['dp_nik'] ?>"><?= $ln['dp_nama'].' - '.$ln['dp_nik']; ?></option>
                <?php endforeach; ?>
              </datalist>
              </div>

              <div class="form-group">
                <label for="idSurat">Layanan Surat</label>
              <input type="text" class="form-control form-control-sm" id="idSurat" name="idSurat" list="listSurat">

              <datalist id="listSurat">
                <?php foreach ($listSurat as $ls) : ?>
                  <option value="<?= $ls['ds_id'] ?>"><?= $ls['ds_layanan']; ?></option>
                <?php endforeach; ?>
              </datalist>
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="masukan Keterangan"></textarea>
              </div>
      </div>
  </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('kependudukan'); ?>" class="btn btn-danger">Kembali</a>
            </form>
                   

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content