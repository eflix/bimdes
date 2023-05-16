<?php  
 include 'koneksiDB.php'; 
 
 $id = $_POST['id'];
 $no = $_POST['no'];
 $jawaban = $_POST['jawaban'];
 
 //$mb_id = 1;
 //$modul = 'twk';
 //$jml_soal = 3;

 $query  = mysqli_query($koneksi,"insert into kuis_dtl (kdtl_id,kdtl_no_soal,kdtl_jawaban) values ('".$id."',".$no.",'".$jawaban."')");

 
if($query){
 
 echo 'Data Submit Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 } 
 

?>