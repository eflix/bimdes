<?php
include 'koneksiDB.php';

 // akun login (user)
 $category = 'UMUM';
 //$nama = $_POST['nama'];
 $nama = 'andi';
 $noHP = '';
 $email = '';
 $alamat = '';
 $password = md5($_POST['password']);
 $password = '12345';
 

// insert akun untuk login
 $query = "insert into member (mb_category,mb_nama,mb_no_hp,mb_email,mb_alamat,mb_password) values ('$category','$nama','$noHP','$email','$alamat','$password')"; 
if(mysqli_query($koneksi,$query)){
 
 echo 'Data Submit Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 } 