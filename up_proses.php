<?php
$namafolder = "gambar/";

include('config.php');

if (!empty($_FILES["nama_file"]["tmp_name"])) {
    $jenis_gambar = $_FILES['nama_file']['type'];
    $id = $_POST['id_user'];
    $nama = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $pass = $_POST['password'];

    if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
        $foto = $namafolder . basename($_FILES['nama_file']['name']);
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
            $sql = "INSERT INTO user (id_user,nama_lengkap,username,password,foto) VALUES
            ('$id','$nama','$username','$pass','$foto')";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            echo "Gambar berhasil dikirim ke direktori " . $foto;
            echo "<h3><a href='./signup.php'> Input Lagi</a></h3>";
            echo "<h3><a href='./index.php'>Login</a></h3>";
        } else {
            echo "<p>Gambar gagal dikirim</p>";
        }
    } else {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
    }
} else {
    echo "Anda belum memilih gambar";
}
