<?php
header('Content-Type: application/json');

require('connect.php');

$resultProduk = $con->query("
	SELECT kategori.nama as namaKategori, COUNT(id_produk) as jumlah 
	FROM kategori, produk 
	WHERE kategori.id_kategori = produk.id_kategori
	GROUP BY kategori.nama
");

$dataProduk = array();

foreach ($resultProduk as $row) {
	$dataProduk[] = $row;
}

$con->close();

echo json_encode($dataProduk);

?>