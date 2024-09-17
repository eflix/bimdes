<?php  

 include 'koneksiDB.php'; 
 
 
 
 $category = $_GET['category'];
 $jenis = $_GET['jenis'];
 //$category = 'UMUM';
 //$jenis = 'dokumen';
 //$pengirim = '7';
 //$nik = '987654321';

 $paramJenis = "";
 if ($jenis) {
    $paramJenis = " and mt_jenis = '$jenis' ";
 }
 

 $hasil = mysqli_query($koneksi,"select md_id,md_modul,count(mt_id) as jml_modul from modul inner join materi on (md_modul = mt_modul) where mt_category = '$category' $paramJenis group by md_id,md_modul");
 //$hasil = mysql_query("SELECT * FROM pengajuan_surat") or die(mysql_error());

 $response = array();

 

if(mysqli_num_rows($hasil)> 0){
    //echo '1';

 while ($row = mysqli_fetch_array($hasil)) {
     //$response[] = $row;
	 array_push($response, array("md_id"=>$row['md_id'],"md_modul"=>$row['md_modul'],"jml_modul"=>$row['jml_modul']));
	 //echo '1';
 }
 
 //var_dump($response);

 echo json_encode(array("daftarModul"=>$response));

} 

?>