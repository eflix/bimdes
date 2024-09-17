  <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>

        <a href="<?= base_url('kuis/tambahSoal'); ?>" class="btn btn-primary btn-sm">Tambah Soal</a>

		<!-- <div class="row mt-3">
			<div class="col-md-6">
				<form action="" method="post">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Cari data Soal.." name="keyword">
						<div class="input-group-append">
							<button type="submit" class="btn btn-primary">Cari</button>
						</div>
					</div>
				</form>
			</div>
		</div> -->

        <table id="data-table" class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Category</th>
				            <th scope="col">Soal</th>
				            <th scope="col">Pilihan A</th>
				            <th scope="col">Pilihan B</th>
				            <th scope="col">Pilihan C</th>
				            <th scope="col">Pilihan D</th>
				            <th scope="col">Pilihan E</th>
				            <th scope="col">Jawaban</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $i = 1;
					          foreach ($soal as $s) : ?>
					          <tr>
					            <td><?= $i ?></td>
					            <td><?= $s['sl_category']; ?></td>
					            <td><?= $s['sl_soal']; ?></td>
					            <td><?= $s['sl_a']; ?></td>
					            <td><?= $s['sl_b']; ?></td>
					            <td><?= $s['sl_c']; ?></td>
					            <td><?= $s['sl_d']; ?></td>
					            <td><?= $s['sl_e']; ?></td>
					            <td><?= $s['sl_jawaban']; ?></td>
					          
					            <td>

					            	 <a class="btn btn-warning btn-sm" href="<?= base_url('kuis/ubahSoal/') . $s['sl_id']; ?>">ubah</a>
					            	 <a class="btn btn-danger btn-sm" href="<?= base_url('kuis/hapusSoal/') . $s['sl_id']; ?>">hapus</a>
					            </td>

					          </tr>
				        	<?php $i++; endforeach; ?>  
				          
				        </tbody>
				      </table> 

    </div>
    <!-- /.container-fluid -->

</div>
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