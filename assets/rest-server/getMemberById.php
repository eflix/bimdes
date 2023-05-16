<?php  
 include 'koneksiDB.php'; 
 
 $id = $_POST['id'];
 //$id = '2';
 
 $response = array();
 
 $hasil  = mysqli_query($koneksi,"select * from member where mb_id = '".$id."'");
 
 if(mysqli_num_rows($hasil)> 0){
		while ($row = mysqli_fetch_assoc($hasil)) {
			$response['user']['id'] = $row['mb_id'];
			$response['user']['nama'] = $row['mb_nama'];
			$response['user']['noHP'] = $row['mb_no_hp'];
			$response['user']['email'] = $row['mb_email'];
			$response['user']['category'] = $row['mb_category'];
			$response['user']['kota'] = $row['mb_kota'];
			$response['user']['alamat'] = $row['mb_alamat'];
	 }
 }
 
echo json_encode($response);

?>