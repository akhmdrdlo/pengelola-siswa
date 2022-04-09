<?php

include('../fungsi/koneksi.php');
$id     =$_POST['id'];
$nama     = $_POST['nama'];
$username     = $_POST['username'];
$password = md5($_POST['password']);
$email     = $_POST['email'];


$query  = "UPDATE admin SET nama='$nama',username='$username',password='$password',email='$email' WHERE id='$id'";
$result     = mysqli_query($conn, $query);


if($result) {  
    echo "success";

} else { 
    echo "error";
}

?>