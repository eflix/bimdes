<?php  

 include 'koneksiDB.php'; 
 
 $hasil = mysqli_query($koneksi,"select mata_pelajaran from master_mapel");


 $response = array();
 
if(mysqli_num_rows($hasil)> 0){
   // echo "1";

 while ($row = mysqli_fetch_array($hasil)) {
     //$response[] = $row;
	 array_push($response, array("mapel"=>$row['mata_pelajaran']));
	 //echo $row['sl_category'];
 }

 echo json_encode(array("mapel"=>$response));

} 

?>