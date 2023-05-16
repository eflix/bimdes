<?php
include 'koneksiDB.php';

 // akun login (user)
 $id = $_POST['id'];
 $password = md5($_POST['password']);
 

// insert akun untuk login
 $query = "update member set mb_password = '$password' where mb_id = '$id'"; 
if(mysqli_query($koneksi,$query)){
 
 echo 'Data Update Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 } 