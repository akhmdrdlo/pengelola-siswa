<?php 
session_start();

if(!$_SESSION['id']){
  echo "<script>window.alert('Anda Harus Login!!'); window.location.href='../login/login.php';</script>";
}

include('../fungsi/koneksi.php');

$id = $_GET['id'];
$query = "SELECT * FROM admin WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$pass = MD5($row['password']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/icon/css/all.css">

    <title>HALAMAN UBAH ADMIN</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
      <div class="col-md-2">
        <ul class="list-group">
          <li class="list-group-item bg-secondary text-white">MAIN MENU</li>
          <a href="../dashboard/index.php" class="list-group-item" style="color: #212529;"> <i class="fas fa-home"></i>Dashboard</a>
          <a href="../dashboard/profil.php" class="list-group-item active" ><i class="fas fa-user-tie"></i> Profile</a>
          <a href="#" data-toggle="modal" data-target="#logout" class="list-group-item" style="color: #212529;"><i class="fas fa-sign-out-alt"></i> Logout</a>
          <ul class="list-group mt-3">
            <button onclick="darkMode()" class="btn btn-md btn-secondary">Ubah Mode</button>
          </ul>
        </ul>
      </div>
        <div class="col-md-10">
          <div class="card">
            <div class="card-body">
              <label>UBAH DATA ADMIN</label>
              <hr>
              <input type="hidden" id="id" value="<?= $row['id']?>">
              <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" value="<?= $row['nama']?>">
                </div>
                
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" id="username" value="<?= $row['username']?>">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" id="password" value="<?= $pass ?>">
                </div>

                <div class="form-group">
                  <label>Alamat Email</label>
                  <input type="email" class="form-control" id="email" value="<?= $row['email']?>">
                </div>
                
                <button class="btn btn-update btn-block btn-success"><i class="fas fa-pen"></i> UBAH DATA</button>
                <button id="reset" class="btn btn-block btn-warning"><i class="fas fa-undo"></i> RESET</button>
              
            </div>
            <!-- Modal Logout -->
              <div class="modal fade mt-5" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabelLogout">Upss!!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <p>Apa kamu yakin ingin Logout, <?php echo $_SESSION['nama'];?>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                        <a href="../fungsi/logout.php" class="btn btn-danger">Logout</a>
                    </div>
                  </div>
                </div>
              </div>

          </div>

        </div>
      </div>
    </div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js" ></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function(){
            $(".btn-update").click(function(){
                
                var id = $("#id").val();
                var nama = $("#nama").val();
                var username = $("#username").val();
                var password = $("#password").val();
                var email = $("#email").val();

                if(nama.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Tolong Masukkan nama Siswa Dahulu!'
                    });
                } else if(username.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Tolong Masukkan Nama Siswa Dahulu!'
                    });
                } else if(password.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Tolong Masukkan Password Siswa Dahulu!'
                    });
                } else if(email.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Tolong Masukkan Alamat Email Siswa Dahulu!'
                    });
                }  
                else {
                    $.ajax({

                        url: "../fungsi/update_admin.php",
                        type: "POST",
                        data: {
                            "id": id,
                            "nama": nama,
                            "username": username,
                            "password": password,
                            "email": email
                        },

                        success:function(response){

                            if (response == "success") {

                                Swal.fire({
                                    type: 'success',
                                    title:'Data Admin Berhasil Diubah!!',
                                    text: 'Silahkan Kembali ke Halaman Sebelumnya'
                                })
                            .then (function() {
                                window.location.href = "../dashboard/index.php";
                            });
                            $("#id").val('');
                            $("#nama").val('');
                            $("#username").val('');
                            $("#password").val('');
                            $('#email').val('');

                            } else {

                                Swal.fire({
                                    type: 'error',
                                    title: 'Data Gagal Diubah!',
                                    text: 'Silahkan Coba Lagi!'
                                });

                            }
                            console.log(response);
                        },
                        error:function(response){
                            Swal.fire({
                                type: 'error',
                                title: 'Ooops!',
                                text: 'Server Error!'
                            });
                        }
                    })
                }
            });
        });

        $(document).ready(function(){
          $("#reset").click(function(){
            $("#nama").val('');
            $("#username").val('');
            $("#password").val('');
            $('#email').val('');
          });
        });
        function darkMode() {
        var element = document.body;
        element.classList.toggle("mode");
        }
</script>
</body>
</html>