<?php
include('./config.php');
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM data_perjalanan WHERE id_perjalanan=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "DATA BERHASIL DIHAPUS";
        header('location: riwayat_perjalanan.php');
    } else {
        die(mysqli_error($conn));
    }
}
