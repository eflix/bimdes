<?php  

 include 'koneksiDB.php'; 
 
 //$pengirim = $_GET['pengirim'];
 //$pengirim = '7';
 //$nik = '987654321';
 

 //$hasil = mysqli_query($koneksi,"select mb_nama,mb_category,uca_penerima_id from user_chat_access
	//					inner join member on (uca_penerima_id = mb_id)
		//				where uca_pengirim_id = " . $pengirim);
						
$hasil = mysqli_query($koneksi,"select * from member where mb_category = 'AHLI HUKUM'");
 //$hasil = mysql_query("SELECT * FROM pengajuan_surat") or die(mysql_error());

 $response = array();

 

if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_array($hasil)) {
     //$response[] = $row;
	 array_push($response, array("nama"=>$row['mb_nama'],"category"=>$row['mb_category'],"penerimaId"=>$row['mb_id']));
 }

 echo json_encode(array("daftarPesan"=>$response));

} 

?>