  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<?php 
    if ($member['mb_category'] <> 'AHLI HUKUM') {$cat = 'Member';} else {$cat = 'Ahli Hukum';};
?>
<h1 class="h3 mb-4 text-gray-800"><?= $title . ' ' . $cat; ?></h1>

<form action="" method="post">
    <input type="hidden" id="id" name="id" value="<?= $member['mb_id']; ?>">
  <div class="row">
      <div class="form-group col-sm-6">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                <?php 
                    if ($member['mb_category'] == 'AHLI HUKUM') {echo '<option>AHLI HUKUM</option>';}
                    else if ($member['mb_category'] == 'UMUM'){
                        echo '<option selected>UMUM</option>';
                        echo '<option>KHUSUS</option>';
                    }
                    else if ($member['mb_category'] == 'KHUSUS'){
                        echo '<option>UMUM</option>';
                        echo '<option selected>KHUSUS</option>';
                    }
                ?>
                </select>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="nama">Nama</label>
      <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= $member['mb_nama']; ?>">
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="nohp">No HP</label>
      <input type="text" class="form-control form-control-sm" id="nohp" name="nohp" value="<?= $member['mb_no_hp']; ?>">
      </div>
    </div>
    
    <div class="col-sm-6">
      <div class="form-group">
        <label for="email">Email</label>
      <input type="text" class="form-control form-control-sm" id="email" name="email" value="<?= $member['mb_email']; ?>">
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="masukan alamat"><?= $member['mb_alamat']; ?></textarea>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="password">Password</label>
      <input type="text" class="form-control form-control-sm" id="password" name="password">
      </div>
    </div>
</div>
<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->