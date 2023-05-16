  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= 'Managemen ' .$title; ?></h1>

<?= $this->session->flashdata('message'); ?>

        <?php echo @$error; ?> 
        <?php echo form_open_multipart('android/tambahBerita');?>
            <div class="row">

                <div class="col-sm-12">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                        <input type="text" class="form-control form-control-sm" id="judul" name="judul">

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="modul">Konten</label>
                    <textarea name="konten" id="konten" cols="120" rows="5"></textarea>
                        </div>
                    </div>
                      
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">

                    <input class="form-control" type='file' name="profile_pic" id="profile_pic" size='20' style="width: 34em; height: 5em;">
                    </div>
                    <div class="form-group col-sm-2">
                        <input class="btn btn-primary btn-sm" type='submit' name='submit' value='Tambah'>
                    </div>
</div>
        </form>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Konten</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <!-- <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                            <th>Konten</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr> -->
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        $i = 1;
                                        foreach ($berita as $b) : ?>
                                        <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= $b['bt_judul']; ?></td>
                                        <td><?= $b['bt_konten']; ?></td>
                                        <td><?= $b['bt_gambar']; ?></td>
                                        <td>
                                        <a class="badge badge-danger" href="<?= base_url('android/hapusBerita/') . $b['bt_id']. '/' . $b['bt_gambar']; ?>">hapus</a>
                                        <a class="badge badge-warning" href="<?= base_url('android/ubahBerita/') . $b['bt_id']; ?>">ubah</a>
                                        </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
           

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->