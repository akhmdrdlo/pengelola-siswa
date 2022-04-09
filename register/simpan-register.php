<?php

include('../fungsi/koneksi.php');

$nama = $_POST['nama'];
$username     = $_POST['username'];
$password     = MD5($_POST['password']);
$email     = $_POST['email'];

//query insert data ke dalam database
$query = "INSERT INTO admin (nama, username, password, email) VALUES ('$nama', '$username', '$password', '$email')";        

if($conn->query($query)) {
    
    echo "success";

} else {
    
    echo "error";

}
?>