<div class="row">
        		<div class="form-group col-sm-4">
	        	<label for="nik">NIK</label>
			  	<input type="text" class="form-control form-control-sm" id="nik" name="nik" list="listNIK" value="<?php if (isset($dtpd['dp_nik'])) { echo $dtpd['dp_nik'];} ?>">
          <!-- <input type="text" name="idPengajuan" name="idPengajuan"> -->

			  	<datalist id="listNIK">
			  		<?php foreach ($daftarPengajuan as $dp) : ?>
			  			<option value="<?php if (isset($id)) { echo $dp['ps_dp_nik'];} ?>"><?php if (isset($dtpd['dp_nik'])) { echo $dp['ps_dp_nik'].' - '.$dp['dp_nama'];} ?></option>
			  		<?php endforeach; ?>
			  	</datalist>
        	</div>

        	<div class="form-group col-sm-4">
        		<label for="nama">Nama</label>
                <input disabled="true" type="text" id="nama" name="nama" class="form-control form-control-sm" value="<?php if (isset($dtpd['dp_nama'])) { echo $dtpd['dp_nama'];} ?>">
           	</div>
</div>

<fieldset disabled>
		  <div class="form-group form-inline">
                <label for="ttl">Tempat & Tgl Lahir</label>
                <input  type="text" id="tmptLahir" name="tmptLahir" class="form-control form-control-sm" value="<?php if (isset($dtpd['dp_tempat_lahir'])) { echo $dtpd['dp_tempat_lahir'];} ?>">
                <input disabled="true" type="text" id="tglLahir" name="tglLahir" class="form-control form-control-sm" value="<?php if (isset($dtpd['dp_tanggal_lahir'])) { echo $dtpd['dp_tanggal_lahir'];} ?>">
           </div>

           <div class="form-group">
                <label for="ttl">Alamat</label>
                <textarea disabled="true" type="text" id="alamat" name="alamat" class="form-control form-control-sm"><?php if (isset($dtpd['dp_alamat'])) { echo $dtpd['dp_alamat'];} ?></textarea>
           </div>
           <div class="form-group form-inline">
                <label for="ttl">Status / Warga Negara / Agama</label>
                <input disabled="true" type="text" id="status" name="status" class="form-control form-control-sm" value="<?php if (isset($dtpd['dp_status_perkawinan'])) { echo $dtpd['dp_status_perkawinan'];} ?>">
                <input disabled="true" type="text" id="wargaNegara" name="wargaNegara" class="form-control form-control-sm" value="<?php if (isset($dtpd['dp_kewarganegaraan'])) { echo $dtpd['dp_kewarganegaraan'];} ?>">
                <input disabled="true" type="text" id="agama" name="agama" class="form-control form-control-sm" value="<?php if (isset($dtpd['dp_agama'])) { echo $dtpd['dp_agama'];} ?>">
           </div>
           </fieldset>