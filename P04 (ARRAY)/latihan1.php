<?php 
// array
// variabel yan dapat memiliki banyak nilai
// elemen pada array boleh memiliki tipe data yang berbeda
// pasangan antara key dan value
// key adalah index, yang dimulai dari 0

// membuat array cara lama
$hari = array("Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu","Minggu");

// cara baru
$bulan = ["Januari","Februari","Maret"];

// array banyak tipe data
$arr1 = [123, "Anigato", false];





echo "<hr>";
// menampilkan array
// Menggunakan var_dump
var_dump($hari); echo "<br>";
echo "<hr>";





echo "<hr>";
// Menggunakan print_r
print_r($bulan); echo "<br>";
echo "<hr>";





echo "<hr>";
// Menampilkan satu elemen pada array
echo $arr1[0]; echo "<br>";
echo $hari[2]; echo "<br>";
echo $bulan[1];
echo "<hr>";




echo "<hr>";
// Menambahkan elemen baru pada array
var_dump($bulan);
$bulan[] = "April";
$bulan[] = "Mei";
$bulan[] = "Juni";
echo "<br>";
var_dump($bulan);

echo "<hr>";







 ?>