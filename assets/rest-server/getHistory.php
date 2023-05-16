<?php  

 include 'koneksiDB.php'; 
 $hasil = mysqli_query($koneksi,"select * from kuis_hdr
 inner join member on (khdr_mb_id = mb_id)
where khdr_status = 'selesai'");

 $response = array();
 
if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_array($hasil)) {
     //$response[] = $row;
	 array_push($response, array("id"=>$row['khdr_id'],"tanggal"=>$row['khdr_tgl'],"mb_id"=>$row['khdr_mb_id'],"mb_nama"=>$row['mb_nama'],"modul"=>$row['khdr_modul'],"status"=>$row['khdr_status'],"nilai"=>$row['khdr_nilai']));
 }

 echo json_encode(array("historyKuis"=>$response));

} 

?>