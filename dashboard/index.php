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

<title>Dashboard</title>
</head>
<body>

<div class="container" style="margin-top: 50px">
  <div class="row">
    
      <div class="col-md-2">
        <ul class="list-group">
          <li class="list-group-item bg-secondary text-white">MAIN MENU</li>
          <a href="index.php" class="list-group-item active" ><i class="fas fa-home"></i> Dashboard</a>
          <a href="profil.php" class="list-group-item" style="color: #212529;"><i class="fas fa-user-tie"></i> Profile</a>
          <a href="#" data-toggle="modal" data-target="#logout" class="list-group-item" style="color: #212529;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </ul>
        <ul class="list-group mt-3">
            <button onclick="darkMode()" class="btn btn-md btn-secondary">Ubah Mode</button>
        </ul>
      </div>

      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
            <h5>DASHBOARD PENGELOLA SISWA</h5>
            </div>
          </div>
            <hr>
            <div class="card">
              <div class="card-body">
                Selamat Datang, <?php echo $_SESSION['nama'] ?>!!
              </div>
            </div>

            <div class="card">
              <div class="card-body">

            <a href="../kelola-siswa/daftar_siswa.php" class="btn btn-md btn-success" style="margin-bottom:10px"> <i class="fas fa-plus"></i> Tambah Data</a>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NISN</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>ALAMAT</th>
                                    <th>ASAL SEKOLAH</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include('../fungsi/koneksi.php');
                                    $no = 1;
                                    $query = mysqli_query($conn, "SELECT * FROM siswa");
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['nisn']?></td>
                                    <td><?= $row['nama_siswa']?></td>
                                    <td><?= $row['alamat']?></td>
                                    <td><?= $row['asal_sekolah']?></td>
                                    <td class="text-center">
                                        <input type="hidden" id="id_siswa" value="<?= $row['id_siswa'] ?>">
                                        <a href="../kelola-siswa/update_siswa.php?id=<?=$row['id_siswa']?>" class="btn btn-sm btn-primary"><i class=" fas fa-pen"></i> EDIT</a>
                                        <!-- <button class="btn btn-sm btn-danger" id="hapus">HAPUS</button> -->
                                        <a href="../fungsi/proses_siswa/proses_hapus.php?id_siswa=<?=$row['id_siswa']?>" id="" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> HAPUS</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        
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
      //  $(document).ready(function(){
      //       $(".btn-regis").click(function(){

      //           var nisn = $("#nisn").val();
      //           var nama_siswa = $("#nama_siswa").val();
      //           var alamat = $("#alamat").val();
      //           var asal_sekolah = $("#asal_sekolah").val();

      //           if(nisn.length == ""){
      //               Swal.fire({
      //                   type: 'warning',
      //                   title: 'Oops...',
      //                   text: 'Tolong Masukkan NISN Siswa Dahulu!'
      //               });
      //           } else if(nama_siswa.length == ""){
      //               Swal.fire({
      //                   type: 'warning',
      //                   title: 'Oops...',
      //                   text: 'Tolong Masukkan Nama Siswa Dahulu!'
      //               });
      //           } else if(alamat.length == ""){
      //               Swal.fire({
      //                   type: 'warning',
      //                   title: 'Oops...',
      //                   text: 'Tolong Masukkan Alamat Siswa Dahulu!'
      //               });
      //           } else if(asal_sekolah.length == ""){
      //               Swal.fire({
      //                   type: 'warning',
      //                   title: 'Oops...',
      //                   text: 'Tolong Masukkan Asal Sekolah Siswa Dahulu!'
      //               });
      //           }  
      //           else {
      //              var ilang = document.body;
      //              ilang.data-dismissList.toggle("modal");
      //               $.ajax({

      //                   url: "../fungsi/proses_siswa/proses_daftar.php",
      //                   type: "POST",
      //                   data: {
      //                       "nisn": nisn,
      //                       "nama_siswa": nama_siswa,
      //                       "alamat": alamat,
      //                       "asal_sekolah": asal_sekolah
      //                   },

      //                   success:function(response){

      //                       if (response == "success") {

      //                           Swal.fire({
      //                               type: 'success',
      //                               title:'Pendaftaran Siswa Berhasil!',
      //                               text: 'Silahkan Kembali ke Halaman Sebelumnya'
      //                           })
      //                       .then (function() {
      //                           window.location.href = "../dashboard/index.php";
      //                       });

      //                       $("#nisn").val('');
      //                       $("#nama_siswa").val('');
      //                       $("#alamat").val('');
      //                       $('#asal_sekolah').val('');

      //                       } else {

      //                           Swal.fire({
      //                               type: 'error',
      //                               title: 'Pendaftaran Gagal!',
      //                               text: 'Silahkan Coba Lagi!'
      //                           });

      //                       }
      //                       console.log(response);
      //                   },
      //                   error:function(response){
      //                       Swal.fire({
      //                           type: 'error',
      //                           title: 'Ooops!',
      //                           text: 'Server Error!'
      //                       });
      //                   }
      //               })
      //           }
      //       });
      //   });

      //   $(document).ready(function(){
      //     $("#reset").click(function(){
      //       $("#nisn").val('');
      //       $("#nama_siswa").val('');
      //       $("#alamat").val('');
      //       $('#asal_sekolah').val('');
      //     });
      //   });

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