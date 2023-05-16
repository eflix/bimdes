<?php  
 include 'koneksiDB.php'; 
 
 $noHP = $_POST['noHP'];
 $password = md5($_POST['password']);
 
 //$username = '09090909';
 //$password = md5('1234');
 
 //$username = '5372726';
 //$password = '188';

 $hasil  = mysqli_query($koneksi,"SELECT * FROM member where mb_no_hp = '".$noHP."' and mb_password = '".$password."'");
 
 //$hasil  = mysql_query("SELECT * FROM user where username = '5372726' and password = '188'") or die(mysql_error());
 
 $response = array();

 

if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_assoc($hasil)) {

	//echo $row['username'];
     $response['user']['nama'] = $row['mb_nama'];
	 $response['user']['noHP'] = $row['mb_no_hp'];
	 $response['user']['category'] = $row['mb_category'];

 }

 echo json_encode($response);

} 

?>