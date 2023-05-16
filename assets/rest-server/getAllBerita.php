<?php  
header('Content-Type: application/json;charset=utf-8');  
 include 'koneksiDB.php'; 
 
 $limit = $_GET['limit'];
 
 //$limit = 0;
 if ($limit <> '0') {
	$hasil = mysqli_query($koneksi,"select * from berita limit ".$limit);
 } else {
	$hasil = mysqli_query($koneksi,"select * from berita"); 
 }
 

 $response = array();
 
if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_array($hasil)) {
     //$response[] = $row;
	 array_push($response, array("id"=>$row['bt_id'],"judul"=>$row['bt_judul'],"konten"=>$row['bt_konten'],"gambar"=>$row['bt_gambar']));
 }
 //var_dump($response);
 

 echo json_encode(array("berita"=>$response),JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

} 

?>