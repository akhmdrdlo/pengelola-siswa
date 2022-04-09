<?php
include('../koneksi.php');

$id = $_GET['id_siswa'];

$query = "DELETE FROM siswa WHERE id_siswa = '$id'";

if($conn->query($query)) {
    echo "success";
    header('location: ../../dashboard/index.php');
} else {
    echo "error";
}

?>