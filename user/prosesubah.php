<?php
include('config.php');
$namafolder = "../gambar/";

$id = $_GET['editid'];
if (!empty($_FILES["nama_file"]["tmp_name"])) {
    $jenis_gambar = $_FILES['nama_file']['type'];
    $id = $_POST['id_user'];
    $nama = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    var_dump($_FILES['nama_file']['type']);
    // Cek jenis gambar
    if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png" || $jenis_gambar == "image/webp") {
        $foto = $namafolder . basename($_FILES['nama_file']['name']);

        // Pindahkan file gambar ke folder yang ditentukan
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
            $sql = "UPDATE user SET nama_lengkap='$nama', username='$username', password='$password', foto='$foto' WHERE id_user='$id'";

            // Lakukan update ke database
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if ($res) {
                echo "Data berhasil diubah. Gambar berhasil diupload ke direktori " . $foto;
                echo "<h3><a href='../index.php'>Login Kembali</a></h3>";
            } else {
                echo "Gagal melakukan update ke database.";
            }
        } else {
            echo "Gagal mengupload gambar.";
        }
    } else {
        echo "Jenis gambar yang Anda kirim salah. Harus .jpg .gif .png";
    }
    echo "ID: " . $id . "<br>";
    echo "Nama: " . $nama . "<br>";
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
    echo "Foto: " . $foto . "<br>";
}
//else {
//     // Jika tidak ada gambar yang diupload, lakukan update tanpa mengubah foto
//     $id = $_POST['id_user'];
//     $nama = $_POST['nama_lengkap'];
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $sql = "UPDATE user SET nama_lengkap = '$nama', username = '$username', password = '$password' WHERE id_user = $id";
//     $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

//     if ($res) {
//         echo "Data berhasil diubah tanpa mengubah gambar.";
//         echo "<h3><a href='./index.php'>Kembali</a></h3>";
//     } else {
//         echo "Gagal melakukan update ke database.";
//     }
// }
