<?php
include 'koneksiDB.php';

 // akun login (user)
 $category = 'UMUM';
 $nama = $_POST['nama'];
 //$nama = 'andi';
 $noHP = $_POST['noHP'];
 $email = $_POST['email'];
 $alamat = $_POST['alamat'];
 $kota = $_POST['kota'];
 $password = md5($_POST['password']);
 $token = $_POST['token'];
 //$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
 //$password = '12345';
 

// insert akun untuk login
 $query = "insert into member (mb_category,mb_nama,mb_no_hp,mb_email,mb_alamat,mb_kota,mb_password,mb_fb_key) values ('$category','$nama','$noHP','$email','$alamat','$kota','$password','$token')"; 
if(mysqli_query($koneksi,$query)){
 
 echo 'Data Submit Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 } 