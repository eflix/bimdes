  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title . ' Kuis'; ?></h1>


<form action="<?= base_url('kuis/pengaturan'); ?>" method="post">
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label for="tanggal">Tanggal Kuis</label>
              <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?php echo $pengaturan['pk_tanggal']; ?>">

              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label for="waktuKuis">Waktu Kuis (Menit)</label>
              <input type="text" class="form-control form-control-sm" id="waktuKuis" name="waktuKuis" value="<?php echo $pengaturan['pk_waktu_kuis']; ?>">

              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label for="waktuSoal">Waktu Setiap Soal (Detik)</label>
              <input type="text" class="form-control form-control-sm" id="waktuSoal" name="waktuSoal" value="<?php echo $pengaturan['pk_waktu_soal']; ?>">

              </div>
            </div>

            
          </div>

          <div class="row">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="modul">Modul Soal</label>
              <input type="text" class="form-control form-control-sm" id="modul" name="modul" value="<?php echo $pengaturan['pk_modul']; ?>">

              </div>
            </div>
      </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </form>

  <div class="row">
    <div class="col-sm-5">
    <h1 class="h3 mb-4 mt-4 text-gray-800">Tambah Modul</h1>
      <form action="<?= base_url('kuis/tambahModul'); ?>" method="post">
        <div class="form-group">
          <label for="modulForm">Modul</label>
          <input type="text" class="form-control form-control-sm" id="modulForm" name="modulForm">

        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
      </form>
      
      <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Modul</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $i = 1;
					          foreach ($modul as $m) : ?>
					          <tr>
					            <td><?= $i ?></td>
					            <td><?= $m['md_modul']; ?></td>
					            <td>
					            	 <a class="btn btn-danger btn-sm" href="<?= base_url('kuis/hapusModul/') . $m['md_id']; ?>">hapus</a>
					            </td>

					          </tr>
				        	<?php $i++; endforeach; ?>  
				          
				        </tbody>
				      </table>

    </div>

    <div class="col-sm-5">
      <h1 class="h3 mb-4 mt-4 text-gray-800">Tambah Jenis Materi</h1>
        <form action="<?= base_url('kuis/tambahJenis'); ?>" method="post">
          <div class="form-group">
            <label for="jenis">Jenis Materi</label>
            <input type="text" class="form-control form-control-sm" id="jenis" name="jenis">

          </div>
          <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        </form>

        <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Jenis</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $i = 1;
					          foreach ($jenis as $j) : ?>
					          <tr>
					            <td><?= $i ?></td>
					            <td><?= $j['jm_jenis']; ?></td>
					            <td>
					            	 <a class="btn btn-danger btn-sm" href="<?= base_url('kuis/hapusJenis/') . $j['jm_id']; ?>">hapus</a>
					            </td>

					          </tr>
				        	<?php $i++; endforeach; ?>  
				          
				        </tbody>
				      </table>
      </div>
    </div>

  </div>

  
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->