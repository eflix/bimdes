<!-- Begin Page Content --> 
<div class="container-fluid">

<!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <form action="<?= base_url('kuis/ubahSoal'); ?>" method="post">
   <input type="hidden" value="<?= $soal['sl_id']; ?>" name="sl_id" id="sl_id">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="category">Category</label>
        <input type="text" class="form-control form-control-sm" id="category" name="category" value ="<?= $soal['sl_category'] ?>" list="listModul">

        <datalist id="listModul">
          <?php foreach ($modul as $m) : ?>
            <option value="<?= $m['md_modul'] ?>"><?= $m['md_id'] . '-' . $m['md_modul']; ?></option>
          <?php endforeach; ?>
        </datalist>
        </div>
      </div>
    </div>

    <div class="row">
    <div class="col-sm-12">
        <div class="form-group">
          <label for="soal">Soal</label>
          <textarea type="text" id="soal" name="soal" class="form-control" placeholder="masukan soal"><?= $soal['sl_soal'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="a">Pilihan A</label>
          <textarea type="text" id="a" name="a" class="form-control" placeholder="masukan pilihan a"><?= $soal['sl_a'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="b">Pilihan B</label>
          <textarea type="text" id="b" name="b" class="form-control" placeholder="masukan soal"><?= $soal['sl_b'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="c">Pilihan C</label>
          <textarea type="text" id="c" name="c" class="form-control" placeholder="masukan soal"><?= $soal['sl_c'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="d">Pilihan D</label>
          <textarea type="text" id="d" name="d" class="form-control" placeholder="masukan soal"><?= $soal['sl_d'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="e">Pilihan E</label>
          <textarea type="text" id="e" name="e" class="form-control" placeholder="masukan soal"><?= $soal['sl_e'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="kunci">Kunci Jawaban</label>
          <select class="form-control" id="kunci" name="kunci">
            <option <?php if ($soal['sl_jawaban'] == 'A'){echo 'selected';} ?>>A</option>
            <option <?php if ($soal['sl_jawaban'] == 'B'){echo 'selected';} ?>>B</option>
            <option <?php if ($soal['sl_jawaban'] == 'C'){echo 'selected';} ?>>C</option>
            <option <?php if ($soal['sl_jawaban'] == 'D'){echo 'selected';} ?>>D</option>
            <option <?php if ($soal['sl_jawaban'] == 'E'){echo 'selected';} ?>>E</option>
          </select>
        </div>
</div>
</div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('kuis'); ?>" class="btn btn-danger">Kembali</a>
      </form>
             

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content