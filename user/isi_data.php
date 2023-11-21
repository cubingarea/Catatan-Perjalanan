<?php
include('./config.php');
session_start();
if (isset($_POST['submit'])) {
  $tanggal = $_POST['tanggal'];
  $waktu = $_POST['waktu'];
  $id_user = $_SESSION['id_user'];
  $lokasi = $_POST['lokasi'];
  $keterangan = $_POST['keterangan'];

  $sql = "INSERT INTO data_perjalanan (tanggal,id_user,waktu,lokasi,keterangan) VALUES ('$tanggal','$id_user','$waktu','$lokasi','$keterangan')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    header('location: riwayat_perjalanan.php');
  } else {
    die(mysqli_error($conn));
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Pengisian Data</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="./logo.png">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="logo.png" width="70" height="40" alt="" />
    <a class="navbar-brand" href="#">Catatan Perjalanan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-right" id="navbarNavAltMarkup">
      <div class="navbar-nav text-right ml-auto">
        <a class="nav-item nav-link" href="index.php">Dashboard</a>
        <a class="nav-item nav-link" href="riwayat_perjalanan.php">Riwayat Perjalanan</a>
        <a class="nav-item nav-link active" href="isi_data.php">Isi data<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="../user/logout.php"><b>Logout</b></a>
      </div>
    </div>
  </nav>
  <div style="margin-top: 10px; margin-bottom: 10px">
    <h2>
      <center>Isi Data Perjalananmu</center>
    </h2>
  </div>
  <div class="container position-relative start-pos-0" style="width: 370px">
    <form action="isi_data.php" method="post">
      <div class="form-group">
        <label for="">Tanggal</label>
        <input type="date" class="form-control" name="tanggal" />
      </div>
      <div class="form-group">
        <label for="">Waktu</label>
        <input type="time" name="waktu" class="form-control" id="waktu" placeholder="waktu" autocomplete="off" />
      </div>
      <div class="form-group">
        <label for="">Lokasi</label>
        <input type="text" class="form-control" name="lokasi" placeholder="masukkan lokasi" autocomplete="off" />
      </div>
      <div class="form-group">
        <label for="">Keterangan</label>
        <input type="text" class="form-control" name="keterangan" placeholder="masukkan keterangan" autocomplete="off" />
        <button class="btn btn-danger my-5">
          <a href="index.php" class="text-light">Kembali</a>
        </button>
        <button type="submit" class="btn btn-primary" name="submit">
          Submit
        </button>
      </div>
    </form>
  </div>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // jQuery methods go here...
      $("button[name='submit']").click(function() {
        alert("Data berhasil ditambahkan");
      });
    });
  </script> -->
</body>

</html>