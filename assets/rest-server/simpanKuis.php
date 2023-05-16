<?php  
 include 'koneksiDB.php'; 
 
 
 $id = $_POST['id'];
 //$id = '3';
 $nilai = rand(50, 100);
 
 //$mb_id = 1;
 //$modul = 'twk';
 //$jml_soal = 3;

 $query  = mysqli_query($koneksi,"update kuis_hdr set khdr_status = 'SELESAI', khdr_nilai = ".$nilai." where khdr_id = '". $id. "'");

 
if($query){
 
 echo 'Data update Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 } 
?>