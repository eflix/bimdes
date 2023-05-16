<?php
include 'koneksiDB.php';

 // akun login (user)
 $id = $_POST['id'];
 $nama = $_POST['nama'];
 //$nama = 'andi';
 //$noHP = $_POST['noHP'];
 $email = $_POST['email'];
 $alamat = $_POST['alamat'];
 $kota = $_POST['kota'];
 //$password = md5($_POST['password']);
 //$token = $_POST['token'];
 //$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
 //$password = '12345';
 

// insert akun untuk login
 $query = "update member set mb_nama = '$nama',mb_email = '$email',mb_alamat = '$alamat',mb_kota = '$kota' where mb_id = '$id'"; 
if(mysqli_query($koneksi,$query)){
 
 echo 'Data Update Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 } 