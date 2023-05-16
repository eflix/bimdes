<?php  
 include 'koneksiDB.php'; 
 
 $no = $_POST['no'];
 $modul = $_POST['modul'];
 
//  $no = '1';
//  $modul = 'Materi akademi desa';

 $hasil  = mysqli_query($koneksi,"select * from (
			select sl_id,sl_soal,sl_category,sl_a,sl_b,sl_c,sl_d,sl_e,sl_jawaban,@curRank := @curRank + 1 AS numb from (SELECT * from soal where sl_category = '".$modul."') s, 
			(SELECT @curRank := 0) r
			) soal
			where numb = '".$no."'");
 
 //$hasil  = mysql_query("SELECT * FROM user where username = '5372726' and password = '188'") or die(mysql_error());
 
 $response = array();
 
 

 

if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_assoc($hasil)) {
    //  echo $no;

// 	echo $row['sl_soal'];
	
     $response['soal']['numb'] = $row['numb'];
     $response['soal']['id'] = $row['sl_id'];
     $response['soal']['sl_soal'] = $row['sl_soal'];
	 $response['soal']['category'] = $row['sl_category'];
	 $response['soal']['a'] = $row['sl_a'];
	 $response['soal']['b'] = $row['sl_b'];
	 $response['soal']['c'] = $row['sl_c'];
	 $response['soal']['d'] = $row['sl_d'];
	 $response['soal']['e'] = $row['sl_e'];
	 $response['soal']['kunci'] = $row['sl_jawaban'];
	 //echo $row['sl_soal'];

 }

 echo json_encode($response);

} 

?>