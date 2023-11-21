<?php
include('./config.php');
$id = $_GET['editid'];
$result = mysqli_query($conn, "SELECT * FROM data_perjalanan WHERE id_perjalanan=$id");
$row = mysqli_fetch_assoc($result);
$tanggal = $row['tanggal'];
$waktu = $row['waktu'];
$lokasi = $row['lokasi'];
$keterangan = $row['keterangan'];

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $lokasi = $_POST['lokasi'];
    $keterangan = $_POST['keterangan'];
    $result = mysqli_query($conn, "UPDATE data_perjalanan set tanggal='$tanggal',waktu='$waktu',lokasi='$lokasi',keterangan='$keterangan' WHERE id_perjalanan=$id");
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
    <title>Edit Data Perjalanan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="./style.css" />
    <link rel="shortcut icon" href="./logo.png">
</head>

<body>
    <div style="margin-top: 10px; margin-bottom: 10px">
        <h2>
            <center>Edit Data Perjalananmu</center>
        </h2>
    </div>
    <div class="container position-relative start-pos-0" style="width: 370px">
        <form method="post">
            <div class="form-group">
                <label for="">ID Perjalanan</label>
                <input type="text" class="form-control" name="id_perjalanan" value="<?php echo $id ?>" disabled>
            </div>
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="<?php echo $tanggal ?>" />
            </div>
            <div class="form-group">
                <label for="">Waktu</label>
                <input type="time" name="waktu" class="form-control" id="waktu" placeholder="waktu" autocomplete="off" value="<?php echo $waktu ?>" />
            </div>
            <div class="form-group">
                <label for="">Lokasi</label>
                <input type="text" class="form-control" name="lokasi" placeholder="masukkan lokasi" autocomplete="off" value="<?php echo $lokasi ?>" />
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" placeholder="masukkan keterangan" autocomplete="off" value="<?php echo $keterangan ?>" />
                <button class="btn btn-danger my-5">
                    <a href="riwayat_perjalanan.php" class="text-light">Kembali</a>
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