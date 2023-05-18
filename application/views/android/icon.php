  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<?= $this->session->flashdata('message'); ?>

<?php echo @$error; ?> 
        <?php echo form_open_multipart('android/ubahIcon');?>
            <div class="row">

                <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Menu</label>
                        <select class="form-control" name="nama" id="nama">
                            <option value="akademik_desa.png">Akademik Desa</option>
                            <option value="bimbel.png">Bimbel</option>
                            <option value="konsultasi_hukum.png">Konsultasi</option>
                            <option value="history.png">History</option>
                            <option value="sertificate.png">Sertifikat</option>
                            <option value="store.png">Pasar Desa</option>
                            <option value="panic_button.png">Tombol Panik</option>
                            <option value="log_out.png">Log Out</option>
                            <option value="khusus.png">Bimtek Khusus</option>
                            <option value="umum.png">Bimtek Umum</option>
                            <option value="dokumen.png">Dokumen</option>
                            <option value="video.png">Video</option>
                            <option value="quiz.png">Kuis</option>
                            <option value="sd.png">SD</option>
                            <option value="smp.png">SMP</option>
                            <option value="sma.png">SMA</option>
                            <option value="smk.png">SMK</option>
                        </select>

                        </div>
                    </div>
                      
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">

                    <input class="form-control" type='file' name="profile_pic" id="profile_pic" size='20' style="width: 34em; height: 5em;" required>
                    </div>
                    <div class="form-group col-sm-2">
                        <input class="btn btn-primary btn-sm" type='submit' name='submit' value='Ubah' required>
                    </div>
        </form>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Android Icon</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th>Nama Icon</th>
                                            <th>Icon</th>
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
                                        foreach ($icon as $ic) : ?>
                                        <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= $ic['ai_menu']; ?></td>
                                        <td><?= $ic['ai_icon']; ?></td>
                                        <td><img src="<?= base_url()."assets/img/android_icon/". $ic['ai_icon']; ?>" alt="" height="50"></td>
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