
          
          <div class="row">
            <div class="form-group col-sm-12">
                <label for="keperluan">Keperluan</label>
                <input  type="text" id="keperluan" name="keperluan" class="form-control form-control-sm">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-6">
                <label for="noJamkesos">No Jamkesos</label>
                <input  type="text" id="noJamkesos" name="noJamkesos" class="form-control form-control-sm">
            </div>
            <div class="form-group col-sm-4">
                <label for="usaha">Usaha</label>
                <input  type="text" id="usaha" name="usaha" class="form-control form-control-sm">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
                <label for="atasNama">Atas Nama / Selaku</label>
                <input  type="text" id="atasNama" name="atasNama" class="form-control form-control-sm">
            </div>
            <div class="form-group col-sm-4">
                  <label for="staff">Staff / Pamong</label>
                  <input  type="text" id="staff" name="staff" class="form-control form-control-sm">
             </div>

             <div class="form-group col-sm-4">
                  <label for="jabatan">Jabatan / Penandatangan</label>
                  <input type="text" id="jabatan" name="jabatan" class="form-control form-control-sm" value="<?= $user['name']; ?>">
             </div>
          </div>
          

           <a href="" class="btn btn-danger btn-sm">batal</a>

           <!-- <a href="" class="badge badge-primary">Cetak PDF</a> -->
           <button type="submit" class="btn btn-primary btn-sm">Cetak Pdf</button>
        </form>



        </div>
        <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->