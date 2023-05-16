<!-- Begin Page Content --> 
  <div class="container-fluid">

      <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

         <form action="<?= base_url('Surat/ubah'); ?>" method="post">
          <div class="row">
            <input type="hidden" name="id" id="id" value="<?php echo $ps['ps_id']; ?>">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="nik">Nama / NIK</label>
              <input type="text" class="form-control form-control-sm" id="nik" name="nik" list="listNik" value="<?php echo $ps['ps_dp_nik']; ?>">

              <datalist id="listNik">
                <?php foreach ($listNama as $ln) : ?>
                  <option value="<?= $ln['dp_nik'] ?>"><?= $ln['dp_nama'].' - '.$ln['dp_nik']; ?></option>
                <?php endforeach; ?>
              </datalist>
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                  <option>Diterima</option>
                  <option>Proses</option>
                  <option>Dicetak</option>
                  <option>Diambil</option>
                </select>
              </div>

              <div class="form-group">
                <label for="idSurat">Layanan Surat</label>
                <div class="form-group form-inline">
                  <input type="text" class="form-control form-control-sm" id="idSurat" name="idSurat" value="<?php echo $ps['ps_ds_id']; ?>">
                  <input type="text" class="form-control form-control-sm" id="kode" name="kode" value="<?php echo $ps['ps_ds_kode']; ?>">
                  <input type="text" class="form-control form-control-sm" id="layanan" name="layanan" value="<?php echo $ps['ps_ds_layanan']; ?>">
                </div>
                

              <datalist id="listSurat">
                <?php foreach ($listSurat as $ls) : ?>
                  <option value="<?= $ls['ds_id'] ?>"><?= $ls['ds_layanan']; ?></option>
                <?php endforeach; ?>
              </datalist>
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="masukan Keterangan"><?php echo $ps['ps_keterangan']; ?></textarea>
              </div>
      </div>

      <!-- <div class="col-sm-6">
        <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Dokumen</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
              </div>
            </td>
            <th scope="row"></th>
            <td>Surat Pengantar RT/RW</td>
            
          </tr>
          
        </tbody>
      </table>
      </div> -->
  </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('surat'); ?>" class="btn btn-danger">Kembali</a>
            </form>
                   

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content