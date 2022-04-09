<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Register Data</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                    <h3 class="text-center">PENDAFTARAN ADMIN</h3>
                        <hr>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Masukkan Alamat Email">
                        </div>

                        <button class="btn btn-register btn-block btn-success">DAFTAR</button>
                        <button id="reset" class="btn btn-block btn-warning">RESET</button>
                    </div>
                </div>
                <div class="text-center" style="margin-top: 15px">
                    Sudah punya akun? <a href="../login/login.php">Silahkan Login</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js" ></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <script>
          $(document).ready(function(){
            $(".btn-register").click(function(){

                var nama = $("#nama").val();
                var username = $("#username").val();
                var password = $("#password").val();
                var email = $("#email").val();

                if(nama.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Tolong Masukkan Nama Lengkap anda!'
                    });
                } else if(username.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Tolong Masukkan Username anda!'
                    });
                } else if(password.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Tolong Masukkan Password anda!'
                    });
                } else if(email.length == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Tolong Masukkan Alamat Email anda!'
                    });
                } else {
                  $.ajax({

                    url: "simpan-register.php",
                    type: "POST",
                    data: {
                      "nama": nama,
                      "username": username,
                      "password": password,
                      "email" : email
                    },

                    success:function(response){

                    if (response == "success") {

                      Swal.fire({
                        type: 'success',
                        title:'Pendaftaran Berhasil!',
                        text: 'Silahkan Login!'
                    })
                    .then (function() {
                        window.location.href = "../login/login.php";
                    });

                    $("#nama").val('');
                    $("#username").val('');
                    $("#password").val('');
                    $("#email").val('');

                    } else {

                      Swal.fire({
                          type: 'error',
                          title: 'Register Gagal!',
                          text: 'silahkan coba lagi!'
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
    </script>

</body>
</html>