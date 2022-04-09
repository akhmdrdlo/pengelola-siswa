<?php

include('../koneksi.php');

$nisn = $_POST['nisn'];
$nama_siswa = $_POST['nama_siswa'];
$alamat     = $_POST['alamat'];
$asal_sekolah     = $_POST['asal_sekolah'];

//query insert data ke dalam database
$query = "INSERT INTO siswa (nisn, nama_siswa, alamat, asal_sekolah) VALUES ('$nisn', '$nama_siswa', '$alamat', '$asal_sekolah')";        

if($conn->query($query)) {
    
    echo "success";

} else {
    
    echo "error";

}
?>