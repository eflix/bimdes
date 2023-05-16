<?php  

 include 'koneksiDB.php'; 
 
 $mb_id = $_GET['id'];
 //$mb_id = '7';
 

 $hasil = mysqli_query($koneksi,"select * from kuis_hdr where khdr_mb_id = ".$mb_id." and khdr_status = 'SELESAI' ");

 $response = array();

 

if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_array($hasil)) {
     //$response[] = $row;
	 array_push($response, array("id"=>$row['khdr_id']));
 }

 echo json_encode(array("sertifikat"=>$response));

} 

?>