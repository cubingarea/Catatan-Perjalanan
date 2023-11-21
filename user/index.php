<?php
include('./config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Website Catatan Perjalanan</title>
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
        <a class="nav-item nav-link active" href="index.php">Dashboard</a>
        <a class="nav-item nav-link" href="riwayat_perjalanan.php">Riwayat Perjalanan<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="isi_data.php">Isi data</a>
        <a class="nav-item nav-link" href="../user/logout.php"><b>Logout</b></a>
      </div>
    </div>
  </nav>
  <div style="margin-top: 30px"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        Selamat datang <b><?php echo $_SESSION['nama_lengkap']; ?></b> di aplikasi catatan
        perjalanan
        <div style="margin-top: 20px">
          <div class="row">
            <div class="col-4">
              <center>
                <img src="<?php echo '../gambar/' . basename($_SESSION['foto']); ?>" height="236" class="img-circle" alt="User Image" style="border: 3px solid white;" />
                <p class="text-dark"><b><?php echo $_SESSION['nama_lengkap']; ?></b></p>
                <p class="text-dark"><?php echo $_SESSION['username']; ?></p>

                <?php echo '<p><a href="ubahdata.php?editid=' . $_SESSION['id_user'] . '">Ubah Data</a></p>'; ?>
              </center>
            </div>
            <div class="col-4 col-sm-6">
              <table class="table text-dark">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $id_user = $_SESSION["id_user"];
                  $sql = "SELECT * FROM data_perjalanan NATURAL JOIN user where id_user='$id_user'";
                  $result = mysqli_query($conn, $sql);
                  if ($result) {
                    $count = 1;
                    $datacount = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $tanggal = $row['tanggal'];
                      $waktu = $row['waktu'];
                      $lokasi = $row['lokasi'];
                      $keterangan = $row['keterangan'];
                      echo '<tr>
                                      <th scope="row">' . $count . '</th>
                                      <td>' . $tanggal . '</td>
                                      <td>' . $waktu . '</td>
                                      <td>' . $lokasi . '</td>
                                      <td>' . $keterangan . ' </td>
                                      </tr>';
                      $count = $count + 1;
                      $datacount = $count - 1;
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="col-2">
              <?php
              if ($count <= 0) {
                echo "<p>Anda telah mengunjungi sebanyak 0 tempat</p>";
              } else if ($count > 0) {
                echo "<p>Anda telah mengunjungi sebanyak " . $datacount . "  tempat</p>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>