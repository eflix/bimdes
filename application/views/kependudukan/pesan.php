  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row text-center">
                    	<div class="col-md-8 offset-0">
                    		<div class="panel panel-default" >
						  <div class="panel-heading" style="height: : 20px;">
						  	<div class="row">
						  		<div class="form-group col-sm-6">
							  	<input type="text" class="form-control form-control-sm pt-3" id="nik" name="nik" value="<?php echo $receipt; ?>">

							  	<datalist id="listNIK">
							  		<?php foreach ($penduduk as $dp) : ?>
							  			<option value="<?= $dp['dp_nik'].' - '.$dp['dp_nama'] ?>"><?= $dp['dp_nama'].' - '.$dp['dp_nik']; ?></option>
							  		<?php endforeach; ?>
							  	</datalist>
				        	</div>
						  	</div>
						  	

						  </div>
						  <div class="panel-body " style="background-color: white; overflow-y:scroll; overflow-x: hidden; height:360px;">
						  	<?php foreach ($pesan as $p) : ?>
	                    		<div class="row">
	                    			<div class="col-md text-left pesan1">
	                    				<?php echo $p['pesan2'].'<br>';?>
	                    			</div>
	                    			<div class="col-md text-right pesan2" id="pesan2" style="padding-right: 20px;">
	                    				<?php echo $p['pesan1'].'<br>';?>
	                    				<!-- <br> -->
	                    			</div>
	                    			
	                    		</div>
	                    		
	                    	<?php endforeach ?>
						</div>
						<div class="panel-footer">
						  	
						  	<div class="row" style="position: relative;">
						  		
						  			<div class="form-group col-sm-12">
						  				<form method="post" action="">
						  					<input type="hidden" name="inputRcpt" id="inputRcpt" value="<?= $receipt ?>">

								  	<input type="text" class="form-control form-control-sm inputPesan" id="inputPesan" name="inputPesan" placeholder="masukan pesan">
								  	</form>
		                    		</div>
						  		
		                    	
						  	</div>
						  </div>
                    	</div>
                    	


                    </div>

                    
						  	
                    
                    	

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->