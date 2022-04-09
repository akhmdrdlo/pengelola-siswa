<?php

session_start();

include('../fungsi/koneksi.php');
$username     = $_POST['username'];
$password      = MD5($_POST['password']);


$query  = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result     = mysqli_query($conn, $query);
$num_row     = mysqli_num_rows($result);
$row         = mysqli_fetch_array($result);

if($num_row >=1) {  
    echo "success";
    $_SESSION['id']         = $row['id'];
    $_SESSION['nama']       = $row['nama'];
    $_SESSION['username']   = $row['username'];
    $_SESSION['email']      = $row['email'];

} else { 
    echo "error";
}

?>