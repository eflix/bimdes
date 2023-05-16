<?php  

 include 'koneksiDB.php'; 
 $hasil = mysqli_query($koneksi,"select * from konten_header");

 $response = array();
 
if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_array($hasil)) {
     //$response[] = $row;
	 array_push($response, array("id"=>$row['kh_id'],"gambar"=>$row['kh_nama']));
 }

 echo json_encode(array("header"=>$response));

} 

?>