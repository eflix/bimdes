  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">NIK</th>
				            <th scope="col">Nama</th>
				            <th scope="col">Status</th>
				            <th scope="col">Kode Surat</th>
				            <th scope="col">Layanan Surat</th>
				            <th>Keterangan</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $i = 1;
					          foreach ($surat as $s) : ?>
					          <tr>
					            <td><?= $i ?></td>
					            <td><?= $s['ps_dp_nik']; ?></td>
					            <td></td>
					            <td><?= $s['ps_status']; ?></td>
					            <td><?= $s['ps_ds_kode']; ?></td>
					            <td><?= $s['ps_ds_layanan']; ?></td>
					            <td><?= $s['ps_keterangan']; ?></td>
					            <td>

					            	<div class="dropdown">
									  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Aksi
									    <!-- <span class="caret"></span> -->
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									    
					            		<li><a class="btn btn-danger btn-sm" href="<?= base_url('surat/hapusPS/') . $s['ps_id']; ?>">hapus</a></li>
					              		<li><a class="btn btn-primary btn-sm" href="<?= base_url('surat/previewSurat/') . $s['ps_ds_id'] . '/' .$s['ps_dp_nik'] . '/'. $s['ps_id']; ?>">Preview</a></li>
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

