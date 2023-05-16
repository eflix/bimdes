  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <a href="<?= base_url('kependudukan/tambah'); ?>" class="btn btn-primary btn-sm mb-3">Tambah Penduduk</a>

                    <div class="row mt-3">
						<div class="col-md-6">
							<form action="" method="post">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Cari data penduduk.." name="keyword">
									<div class="input-group-append">
										<button type="submit" class="btn btn-primary">Cari</button>
									</div>
								</div>
							</form>
						</div>
					</div>

                    <div class="row">
				      <div class="col-lg">

				         <?= form_error('blog', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

				         <?= $this->session->flashdata('message'); ?>

				        <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th>Aksi</th>
				            <th width="100px">NIK</th>
				            <th class="col-xs-5">Nama</th>
				            <th scope="col">No KK</th>
				            <th scope="col">TTL</th>
				            <th>Alamat</th>
				            <th scope="col">Kecamatan</th>
				            <th scope="col">Kelurahan</th>
				            <th scope="col">Kabupaten</th>
				            <th scope="col">Agama</th>
				            <th scope="col">Status Perkawinan</th>
				            <th scope="col">Pekerjaan</th>
				            <th scope="col">Kewarganegaraan</th>
				            <th scope="col">Petugas</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $i = 1;
					          foreach ($penduduk as $p) : ?>
					          <tr>
					            <td><?= $i ?></td>
					            <td>
					            	<div class="dropdown">
									  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Aksi
									    <!-- <span class="caret"></span> -->
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									    <li><a class="btn btn-primary btn-sm" href="<?= base_url('kependudukan/dokumen/') . $p['dp_nik']; ?>">Upload Dokumen</a></li>
					              <li><a class="btn btn-primary btn-sm" href="<?= base_url('kependudukan/ubahPenduduk/') . $p['dp_nik']; ?>">Ubah Data</a></li>
					              <li><a class="btn btn-warning btn-sm" href="<?= base_url('kependudukan/pesan/') . $p['dp_nik']; ?>">Kirim Pesan</a></li>
					              <li><a class="btn btn-danger btn-sm" href="<?= base_url('kependudukan/hapusPenduduk/') . $p['dp_nik']; ?>">Hapus</a></li>
					              
									  </ul>
									</div>
								</td>
					            <td><?= $p['dp_nik']; ?></td>
					            <td class="col-xs-5"><?= $p['dp_nama']; ?></td>
					            <td><?= $p['dp_no_kk']; ?></td>
					            <td><?= $p['dp_tempat_lahir'].','.$p['dp_tanggal_lahir']; ?></td>
					            <td><?= $p['dp_alamat']; ?></td>
					            <td><?= $p['dp_kecamatan']; ?></td>
					            <td><?= $p['dp_kelurahan']; ?></td>
					            <td><?= $p['dp_kabupaten']; ?></td>
					            <td><?= $p['dp_agama']; ?></td>
					            <td><?= $p['dp_status_perkawinan']; ?></td>
					            <td><?= $p['dp_pekerjaan']; ?></td>
					            <td><?= $p['dp_kewarganegaraan']; ?></td>
					            <td><?= $p['created_by']; ?></td>

					          </tr>
				        	<?php $i++; endforeach; ?>  
				          
				        </tbody>
				      </table>  
				       

				      </div>
				    </div>

                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->