  <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		<form action="" method="post">
          <div class="row">
		  	<div class="form-group col-sm-6">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                          <option>UMUM</option>
                          <option>KHUSUS</option>
                        </select>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="nama">Nama</label>
              <input type="text" class="form-control form-control-sm" id="nama" name="nama">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="nohp">No HP</label>
              <input type="text" class="form-control form-control-sm" id="nohp" name="nohp">
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Email</label>
              <input type="text" class="form-control form-control-sm" id="email" name="email">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="masukan alamat"></textarea>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="password">Password</label>
              <input type="text" class="form-control form-control-sm" id="password" name="password">
              </div>
            </div>
      </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            </form>
		
		<div class="row mt-3">
			<div class="col-md-6">
				<form action="" method="post">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Cari data member.." name="keyword">
						<div class="input-group-append">
							<button type="submit" class="btn btn-primary">Cari</button>
						</div>
					</div>
				</form>
			</div>
		</div>

        <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Category</th>
				            <th scope="col">Nama</th>
				            <th scope="col">No Hp</th>
				            <th scope="col">Email</th>
				            <th scope="col">Alamat</th>
				            <th scope="col">Status</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $i = 1;
					          foreach ($member as $m) : ?>
					          <tr>
					            <td><?= $i ?></td>
					            <td><?= $m['mb_category']; ?></td>
					            <td><?= $m['mb_nama']; ?></td>
					            <td><?= $m['mb_no_hp']; ?></td>
					            <td><?= $m['mb_email']; ?></td>
					            <td><?= $m['mb_alamat']; ?></td>
					            <td><?php if ($m['mb_is_active'] == 0) {
									echo 'Belum Aktif';
								} else {
									echo 'Aktif';
								}
								 ?></td>
					            <td>
					            	<div class="dropdown">
									  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Aksi
									    <!-- <span class="caret"></span> -->
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									    <li><a class="btn btn-warning btn-sm" href="<?= base_url('admin/ubahStatusMember/') . $m['mb_id'] . '/' . $m['mb_is_active']; ?>"><?php if ($m['mb_is_active'] == 0) {
													echo 'Terima';
												} else {
													echo 'Non Aktifkan';
												}
												?></a></li>
										<li><a class="btn btn-primary btn-sm" href="<?= base_url('admin/pesan/') . $m['mb_no_hp']; ?>">Kirim Pesan</a></li>

										<li><a class="btn btn-warning btn-sm" href="<?= base_url('admin/ubahMember/') . $m['mb_id']; ?>">Ubah</a></li>

										<li><a class="btn btn-danger btn-sm" href="<?= base_url('admin/hapusMember/') . $m['mb_id']; ?>">Hapus</a></li>
					              
					              
									  </ul>
									</div>
								</td>

					          </tr>
				        	<?php $i++; endforeach; ?>  
				          
				        </tbody>
				      </table> 

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->