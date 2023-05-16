<?php  
 include 'koneksiDB.php'; 
 
//  $modul = 'twk';
 $modul = $_POST['modul'];
 
 //$no = '1';
 //$modul = 'twk';

 $hasil  = mysqli_query($koneksi,"select count(sl_id) as jmlSoal from soal where sl_category = '".$modul. "'");
 
 //$hasil  = mysql_query("SELECT * FROM user where username = '5372726' and password = '188'") or die(mysql_error());
 
 $response = array();

 

if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_assoc($hasil)) {

	//echo $row['username'];
	
     $response['kuis']['jmlSoal'] = $row['jmlSoal'];

 }

 echo json_encode($response);

} 

?>