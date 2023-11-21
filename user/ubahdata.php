<?php
include('./config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="./logo.png">
</head>

<body>
    <div class="container">
        <div style="margin-top: 10px; margin-bottom: 10px">
            <h2>
                <center>Ubah Data Kamu</center>
            </h2>
        </div>
        <div class="container position-relative start-pos-0" style="width: 370px">
            <form action="prosesubah.php?editid=<?php echo $_SESSION['id_user'] ?>" method="post" enctype='multipart/form-data'>

                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" class="form-control" name="id_user" value="<?php echo $_SESSION['id_user'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama Lengkap Anda" value="<?php echo $_SESSION['nama_lengkap'] ?>" />
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda" value="<?php echo $_SESSION['username'] ?>" />
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Nama Lengkap Anda" value="<?php echo $_SESSION['password'] ?>" />
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" class="form-control" name="nama_file" />
                </div>
                <button class="btn btn-danger"><a href="../user/index.php" class="text-light">Kembali</a></button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</body>

</html>