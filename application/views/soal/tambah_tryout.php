<!-- Begin Page Content --> 
<div class="container-fluid">

<!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <form action="<?= base_url('soal/tambahTryOut'); ?>" method="post">
    <input type="hidden" id="id_category" name="id_category" value="<?= $category; ?>">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="category">Category</label>
        <input type="text" class="form-control form-control-sm" id="modul" name="modul" list="listModul">

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
          <textarea type="text" id="soal" name="soal" class="form-control" placeholder="masukan soal"></textarea>
        </div>
        <div class="form-group">
          <label for="a">Pilihan A</label>
          <textarea type="text" id="a" name="a" class="form-control" placeholder="masukan pilihan a"></textarea>
        </div>
        <div class="form-group">
          <label for="b">Pilihan B</label>
          <textarea type="text" id="b" name="b" class="form-control" placeholder="masukan soal"></textarea>
        </div>
        <div class="form-group">
          <label for="c">Pilihan C</label>
          <textarea type="text" id="c" name="c" class="form-control" placeholder="masukan soal"></textarea>
        </div>
        <div class="form-group">
          <label for="d">Pilihan D</label>
          <textarea type="text" id="d" name="d" class="form-control" placeholder="masukan soal"></textarea>
        </div>
        <div class="form-group">
          <label for="e">Pilihan E</label>
          <textarea type="text" id="e" name="e" class="form-control" placeholder="masukan soal"></textarea>
        </div>
        <div class="form-group">
          <label for="kunci">Kunci Jawaban</label>
          <select class="form-control" id="kunci" name="kunci">
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
          </select>
        </div>
</div>
</div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('soal/tryout/'.$category); ?>" class="btn btn-danger">Kembali</a>
      </form>
             

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content