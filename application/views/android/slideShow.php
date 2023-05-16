  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<?php echo @$error; ?> 
        <?php echo form_open_multipart('android/tambahSlideShow');?>
            <div class="row">

                <!-- <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Slide Show</label>
                        <select class="form-control" name="nama" id="nama">
                            <option value="image_1.jpg">Gambar 1</option>
                            <option value="image_2.jpg">Gambar 2</option>
                            <option value="image_3.jpg">Gambar 3</option>
                            <option value="image_4.jpg">Gambar 4</option>
                            <option value="image_5.jpg">Gambar 5</option>
                        </select>

                        </div>
                    </div>
                      
                </div> -->

                <div class="col-sm-6">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                        <input type="text" class="form-control form-control-sm" id="judul" name="judul">

                        </div>
                    </div>

                <div class="row">
                    <div class="form-group col-sm-6">

                    <input class="form-control" type='file' name="profile_pic" id="profile_pic" size='20' style="width: 34em; height: 5em;">
                    
                </div>
    </div>

    <div class="row">
                </div>
                        <div class="form-group col-sm-2">
                            <input class="btn btn-primary btn-sm" type='submit' name='submit' value='Tambah'>
                        </div>
                </div>
        </form>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Slide Show</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
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
                                        foreach ($slideShow as $ss) : ?>
                                        <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= $ss['kh_judul']; ?></td>
                                        <td><?= $ss['kh_nama']; ?></td>
                                        <td>
                                        <a class="badge badge-danger" href="<?= base_url('android/hapusSlideShow/') . $ss['kh_id']. '/'.$ss['kh_nama']; ?>">hapus</a>
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