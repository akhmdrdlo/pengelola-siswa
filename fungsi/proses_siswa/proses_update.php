<?php 
include('../koneksi.php');

$id_siswa  = $_POST['id_siswa'];
$nisn = $_POST['nisn'];
$nama_siswa = $_POST['nama_siswa'];
$alamat = $_POST['alamat'];
$asal_sekolah = $_POST['asal_sekolah'];

$query = "UPDATE siswa SET nisn='$nisn',nama_siswa='$nama_siswa',alamat='$alamat',asal_sekolah='$asal_sekolah' WHERE id_siswa='$id_siswa'";

if($conn->query($query)) {
    
    echo "success";

} else {
    
    echo "error";

}
    
?>