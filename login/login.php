
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<title>Login Akun</title>
</head>
<body>

<div class="container" style="margin-top: 50px">
  <div class="row">
    <div class="col-md-5 offset-md-3">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center">LOGIN</h3>
          <hr>

            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
            </div>
            
            <button class="btn btn-login btn-block btn-success">LOGIN</button>
          
        </div>
      </div>

      <div class="text-center" style="margin-top: 15px">
        Belum punya akun? <a href="../register/register.php">Silahkan Register</a>
      </div>

    </div>
  </div>
</div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js" ></script>
<script src="../assets/js/sweetalert2.all.min.js"></script>

<script>
      $(document).ready(function(){
            $(".btn-login").click(function(){

                var username = $("#username").val();
                var password = $("#password").val();


                if(username.length == ""){
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
                    }  
                    else {
                        $.ajax({
                            url: "cek-login.php",
                            type: "POST",
                            data: {
                                "username": username,
                                "password": password
                            },

                        success:function(response){

                        if (response == "success") {
                            Swal.fire({
                                type: 'success',
                                title: 'Login Berhasil!',
                                text: 'Anda akan di arahkan dalam 2 Detik',
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                            .then (function() {
                                window.location.href = "../dashboard/index.php";
                            });

                        } else {

                            Swal.fire({
                            type: 'error',
                            title: 'Login Gagal!',
                            text: 'Silahkan Coba Lagi!!'
                            });

                            }
                            console.log(response);
                        },

                        error:function(response){
                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });
                            console.log(response);
                            }
                        });
                        }
                    });
                });
</script>
</body>
</html>
