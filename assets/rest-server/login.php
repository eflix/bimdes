<?php  
 include 'koneksiDB.php'; 
 
 $noHP = $_POST['noHP'];
 $password = md5($_POST['password']);
 
 //$noHP = '121212';
 //$password = md5('1234');
 $response = array();
 
 $hasil  = mysqli_query($koneksi,"SELECT * FROM member where mb_no_hp = '".$noHP."'");
 
 if(mysqli_num_rows($hasil)> 0){
	//$response['user']['pesan'] = 'login';
	$hasil  = mysqli_query($koneksi,"SELECT * FROM member where mb_no_hp = '".$noHP."' and mb_password = '".$password."'");
	 if(mysqli_num_rows($hasil)> 0){
		$response['user']['pesan'] = 'login'; 
		while ($row = mysqli_fetch_assoc($hasil)) {
			$response['user']['id'] = $row['mb_id'];
			$response['user']['nama'] = $row['mb_nama'];
			$response['user']['noHP'] = $row['mb_no_hp'];
			$response['user']['category'] = $row['mb_category'];
			$response['user']['kota'] = $row['mb_kota'];
		}
	 } else {
		 $response['user']['pesan'] = 'password salah'; 
	 }
 } else {
	$response['user']['pesan'] = 'Akun belum terdaftar';
 }
 
 /*

if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_assoc($hasil)) {

	//echo $row['username'];
	
     $response['user']['id'] = $row['mb_id'];
     $response['user']['nama'] = $row['mb_nama'];
	 $response['user']['noHP'] = $row['mb_no_hp'];
	 $response['user']['category'] = $row['mb_category'];

 }

} 

*/

echo json_encode($response);

?>