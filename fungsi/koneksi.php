<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "data_siswa";

$conn = mysqli_connect($host,$user,$pass,$db_name);

if($conn) { 

} else {
    echo "Koneksi Gagal, Tidak dapat terhubung ke database : ".mysqli_connect_error();
}

?>