<?php
// membuat koneksi
require 'koneksi.php';

$nama=$_POST['nama'];
$no_meja = $_POST['no_meja'];
$makanan=$_POST['makanan'];
// $minuman=$_POST['minuman'];
$jumlah_makanan = $_POST['jumlah_makanan'];
// $jumlah_minuman = $_POST['jumlah_minuman'];
$tanggal=$_POST['tanggal'];

// membuat table customer
$j = 0;
for ($i=0; $i < count($jumlah_makanan); $i++) { 
	if ($jumlah_makanan[$i] != NULL) {
		$jumlah = $jumlah_makanan[$i];
		$idmenu = $makanan[$j];
		echo "$nama $no_meja $idmenu $jumlah $tanggal<br>";
		$harga = $konek->query("SELECT hargamenu FROM menu WHERE idmenu = '$idmenu'");
		foreach ($harga as $h) {
			$totalHarga = $h['hargamenu']*$jumlah;
			$query = $konek->query("INSERT INTO `pesan`(`nama`, `nomormeja`, `idmenu`, `jumlah`, `tanggal`) VALUES ('$nama',$no_meja,'$idmenu',$jumlah,'$tanggal')");
		}
		$j++;
	}
}
if ($query) {
	echo "Sukses";
	header("location:transaksi.php");
}
// if($konek->query($sql)){
//   echo "data customer BERHASIL dibuat!<br/>";
// }else{
//   echo "data customer GAGAL dibuat : ".$konek->error."<br/>";
// }
// $konek->close();
// echo "<a href='index.php'>Back to Home</a>";
?>
