<?php  
 include 'koneksiDB.php'; 
 
 $tgl = '2022-01-16';
 $mb_id = $_POST['id'];
 $modul = $_POST['modul'];
 $status = 'UJIAN';
 $jml_soal = $_POST['jmlSoal'];
 $benar = 0;
 $salah = 0;
 $nilai = 0;
 
 //$mb_id = 1;
 //$modul = 'twk';
 //$jml_soal = 3;

 $query  = mysqli_query($koneksi,"insert into kuis_hdr (khdr_tgl,khdr_mb_id,khdr_modul,khdr_status,khdr_jml_soal,khdr_benar,khdr_salah,khdr_nilai) values ('".$tgl."',".$mb_id.",'".$modul."','".$status."',$jml_soal,".$benar.",".$salah.",".$nilai.")");

 
if($query){
 
 //echo 'Data Submit Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 } 
 

 $query = "select * from kuis_hdr where khdr_mb_id = ".$mb_id." and khdr_modul = '".$modul."' and khdr_status = 'UJIAN' order by khdr_id desc limit 1";
 
 $hasil = mysqli_query($koneksi,$query);
 
 $response = array();
 
if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_assoc($hasil)) {

	//echo $row['username'];
	
     $response['kuis_hdr']['id'] = $row['khdr_id'];

 }

 echo json_encode($response);

}

?>