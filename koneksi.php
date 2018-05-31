<?php 
$konek = new mysqli("localhost","root","","restokiki");

// mengecek koneksi
if($konek->connect_error){
  die("Koneksi Gagal Karena : ". $konek->connect_error);
}

 ?>