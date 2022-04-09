<?php 
session_start();

if(!$_SESSION['id']){
    echo "<script>window.alert('Anda Harus Login!!'); window.location.href='../login/login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/icon/css/all.css">

<title>Profil Anda</title>
</head>
<body>

<div class="container" style="margin-top: 50px">
  <div class="row">
    
      <div class="col-md-2">
        <ul class="list-group">
          <li class="list-group-item bg-secondary text-white">MAIN MENU</li>
          <a href="index.php" class="list-group-item" style="color: #212529;" ><i class="fas fa-home"></i> Dashboard</a>
          <a href="profil.php" class="list-group-item active" ><i class="fas fa-user-tie"></i> Profile</a>
          <a href="#" data-toggle="modal" data-target="#logout" class="list-group-item" style="color: #212529;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </ul>
        <ul class="list-group mt-3">
            <button onclick="darkMode()" class="btn btn-md btn-secondary">Ubah Mode</button>
        </ul>
      </div>

      <div class="col-md-10">
        <div class="card"> 
          <div class="card-body">
            <h2>Profil Anda</h2>
            <hr>
            <a href="ubah-admin.php?id=<?=$_SESSION['id']?>" id="id" class="btn btn-sm btn-info float-right"><i class="fas fa-user-edit"></i> Ubah Profil Admin</a>
            <h5>Nama Profil</h5>
            <?= $_SESSION['nama'] ?> <br> <br>
            <h5>Username Anda</h5>  
            <?= $_SESSION['username']?> <br> <br>
            <h5>Alamat Email</h5>
            <?= $_SESSION['email']?>
            <hr>
            <a class="text-white btn btn-block btn-danger" href="#" data-toggle="modal" data-target="#logout" ><i class="fas fa-sign-out-alt"></i> Logout</a>
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
<script src="../assets/js/jquery.dataTables.min.js"></script>
    <script>
 
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );

      function darkMode() {
    var element = document.body;
    element.classList.toggle("mode");
  }
    </script>
</body>
</html>