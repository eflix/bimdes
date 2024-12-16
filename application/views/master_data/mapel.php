  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>
    <div class="">
        <?php echo @$error; ?> 
        <?php echo form_open_multipart('master_data/mapel');?>

        <!-- <div class="preview" style="margin-bottom:20px;"></div>

        <div class="progress" style="display:none">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"> 0% </div>
            </div> -->
            
        <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="modul">Mata Pelajaran</label>
                <input type="text" class="form-control form-control-sm" id="mapel" name="mapel" required>
            </div>
        </div>

        <div class="form-group col-sm-1">
            <input class="btn btn-primary btn-sm" style="margin-top: 30px;" type='submit' name='submit' value='Tambah'>
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
    <th scope="col">Mata Pelajaran</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $i = 1;
    foreach ($mapel as $mp) : ?>
    <tr>
    <td><?= $i ?></td>
    <td><?= $mp['mata_pelajaran']; ?></td>
    <td>
        <a class="badge badge-warning" href="<?= base_url('kuis/ubahMateri/') . $mp['id']; ?>">ubah</a>
        <a class="badge badge-danger" href="<?= base_url('kuis/hapusMateri/') . $mp['id']; ?>">hapus</a>
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

// document.getElementById("data-table_wrapper").classList.add('mt-5')

</script>