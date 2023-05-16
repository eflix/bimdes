  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                   

                    <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Kode</th>
				            <th scope="col">Layanan</th>
				            <th scope="col">Link</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $i = 1;
					          foreach ($daftarSurat as $ds) : ?>
					          <tr>
					            <td><?= $i ?></td>
					            <td><?= $ds['ds_kode']; ?></td>
					            <td><?= $ds['ds_layanan']; ?></td>
					            <td><?= $ds['ds_link']; ?></td>
					            <td>
					            	<a class="badge badge-primary" href="<?= base_url('surat/cetak/') . $ds['ds_id']; ?>">cetak</a>
					            </td>

					          </tr>
				        	<?php $i++; endforeach; ?>  
				          
				        </tbody>
				      </table>  
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->