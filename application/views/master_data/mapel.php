  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 text-gray-800"><?= $title; ?></h1>

<?= $this->session->flashdata('message'); ?>
<div>
<?php echo @$error; ?> 
<?php echo form_open_multipart('kuis/upload');?>

<!-- <div class="preview" style="margin-bottom:20px;"></div>

  <div class="progress" style="display:none">
      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"> 0% </div>
    </div> -->
    
<div class="row">

  <div class="form-group col-sm-2">
        <label for="category">Category</label>
        <select class="form-control" id="category" name="category" required>
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
          <select class="form-control" id="jenis" name="jenis" required>
            <option>video</option>
            <option>dokumen</option>
          </select>
  </div>

<div class="col-sm-6">
    <div class="form-group">
      <label for="modul">Modul</label>
    <input type="text" class="form-control form-control-sm" id="modul" name="modul" list="listModul" required>

    <datalist id="listModul">
      <?php foreach ($modul as $m) : ?>
        <option value="<?= $m['md_modul'] ?>"><?= $m['md_id'] . '-' . $m['md_modul']; ?></option>
      <?php endforeach; ?>
    </datalist>
    </div>
</div>
</div>

<div class="row">
<div class="col-sm-5">
  <div class="form-group">
      <label for="file">Dokumen / Video</label>
      <input class="form-control" type='file' name="profile_pic" id="profile_pic" size='20' style="width: 28em; height: 5em;" value="drag & drop" required>
      <h7>File tipe : pdf/mp4</h7>
  </div>
</div>

<div class="col-sm-5 ml-5">
      <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
        <input class="form-control" type='file' name="thumbnail" id="thumbnail" size='20' style="width: 28em; height: 5em;" value="drag & drop">
            <h7>File tipe : jpg/png</h7>
      </div>
  </div>
      

      

    <div class="form-group col-sm-1">
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
<!-- </div> -->


<!-- <div class="row mt-3">
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
</div> -->

<table id="data-table" class="table table-hover table-responsive mt-3" style="font-size: 12px;margin-top:30px;">
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


<!-- </div> -->



</div>
</div>
<!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->


<!-- End of Main Content -->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets'); ?>/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets'); ?>/datatables/dataTables.bootstrap4.min.js"></script>

<script>
$('#data-table').DataTable({
scrollY:        "500px",
scrollX:        true,
scrollCollapse: true,
"autoWidth": false,
"bLengthChange": false,
});

var div = $('#data-table_wrapper .row .col-sm-12.col-md-6')
// console.log(div[0])

$(div[0]).html($('#form-search'))

document.getElementById("data-table_wrapper").classList.add('mt-5')

</script>