<?php  

 include 'koneksiDB.php'; 
 

 
 $category = $_GET['category'];
 $jenis = $_GET['jenis'];
 $modul = $_GET['modul'];
 //$pengirim = '7';
 //$nik = '987654321';
 

 $hasil = mysqli_query($koneksi,"select * from materi where mt_category = '".$category."' and mt_jenis = '". $jenis ."' and mt_modul = '". $modul ."'");
 //$hasil = mysql_query("SELECT * FROM pengajuan_surat") or die(mysql_error());

 $response = array();

 

if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_array($hasil)) {
     //$response[] = $row;
	 array_push($response, array("mt_id"=>$row['mt_id'],"mt_category"=>$row['mt_category'],"mt_jenis"=>$row['mt_jenis'],"mt_modul"=>$row['mt_modul'],"mt_file"=>$row['mt_file'],"mt_video_tumb"=>$row['mt_video_tumb'],"mt_notes"=>$row['mt_notes']));
 }

 echo json_encode(array("dokumen"=>$response));

} 

?>