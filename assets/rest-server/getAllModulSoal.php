<?php  

 include 'koneksiDB.php'; 
 
 $category = $_GET['category'];
 
 $hasil = mysqli_query($koneksi,"select distinct sl_category from soal
LEFT OUTER JOIN materi ON (sl_category = mt_modul)
WHERE mt_category IN ('".$category."')");


 $response = array();
 
if(mysqli_num_rows($hasil)> 0){
   // echo "1";

 while ($row = mysqli_fetch_array($hasil)) {
     //$response[] = $row;
	 array_push($response, array("modul"=>$row['sl_category']));
	 //echo $row['sl_category'];
 }

 echo json_encode(array("modulSoal"=>$response));

} 

?>