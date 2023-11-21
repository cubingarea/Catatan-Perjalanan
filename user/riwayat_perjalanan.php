<?php
include('./config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat perjalanan</title>
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
        <a class="nav-item nav-link active" href="riwayat_perjalanan.php">Riwayat Perjalanan<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="isi_data.php">Isi data</a>
        <a class="nav-item nav-link" href="../user/logout.php"><b>Logout</b></a>
      </div>
    </div>
  </nav>
  <div class="container">
    <div style="margin-top: 10px; margin-bottom: 10px">
      <h2>
        <center>Riwayat Perjalanan anda</center>
      </h2>
    </div>
    <table id="example" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Lokasi</th>
          <th>Keterangan</th>
          <th>aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_GET['submit'])) {
          $tanggal = $_GET['tanggal'];

          $id_user = $_SESSION["id_user"];
          $sql = "SELECT * FROM data_perjalanan NATURAL JOIN user where  tanggal= '$tanggal' AND id_user='$id_user'";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id_perjalanan'];

              $tanggal = $row['tanggal'];
              $waktu = $row['waktu'];
              $lokasi = $row['lokasi'];
              $keterangan = $row['keterangan'];

              echo '<tr>
                <th>' . $count . '</th>
                <td>' . $tanggal . '</td>
                <td>' . $waktu . '</td>
                <td>' . $lokasi . '</td>
                <td>' . $keterangan . ' °C</td>
                <td>
                <button class="btn btn-primary"><a href="edit.php?editid=' . $id . '" class="text-light">Update</a></button>
                <button class="btn btn-danger"><a href="hapus.php?deleteid=' . $id . '" onClick="return confirm(\'Yakin Ingin Hapus ?\')" class="text-light">Hapus</a></button>
                 </td>
              </tr>';
              $count = $count + 1;
            }
          }
        } else if (!isset($_GET['submit'])) {
          $id_user = $_SESSION["id_user"];
          $sql = "SELECT * FROM data_perjalanan NATURAL JOIN user where id_user='$id_user'";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id_perjalanan'];
              $tanggal = $row['tanggal'];
              $waktu = $row['waktu'];
              $lokasi = $row['lokasi'];
              $keterangan = $row['keterangan'];
              echo '<tr>
                <th>' . $count . '</th>
                <td>' . $tanggal . '</td>
                <td>' . $waktu . '</td>
                <td>' . $lokasi . '</td>
                <td>' . $keterangan . ' </td>
                <td>
                <button class="btn btn-primary"><a href="edit.php?editid=' . $id . '" class="text-light">Update</a></button>
                <button class="btn btn-danger"><a href="hapus.php?deleteid=' . $id . '" onClick="return confirm(\'Yakin Ingin Hapus ?\')" class="text-light">Hapus</a></button>
                
                 </td>
              </tr>';
              $count = $count + 1;
            }
          }
        }
        ?>
      </tbody>
    </table>
    <div>
      <button class="btn btn-danger">
        <a href="index.php" class="text-light">Kembali</a>
      </button>
      <button class="btn btn-primary">
        <a href="isi_data.php" class="text-light">Isi Data</a>
      </button>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#example").DataTable();
    });
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
</body>

</html>