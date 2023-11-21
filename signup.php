<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./asset/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./logo.png">
</head>

<body>
    <div class="login-container">
        <form action="./up_proses.php" method="post" class="form-login" enctype='multipart/form-data'>
            <ul class="login-nav">
                <li class="login-nav__item">
                    <a href="index.php">Sign In</a>
                </li>
                <li class="login-nav__item active">
                    <a href="#">Sign Up</a>
                </li>
            </ul>
            <input id="login-input-user" class="login__input" type="hidden" name="id_user" />
            <label for="login-input-user" class="login__label">
                Nama Lengkap
            </label>
            <input id="login-input-user" class="login__input" type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap Anda" />
            <label for="login-input-user" class="login__label">
                Username
            </label>
            <input id="login-input-user" class="login__input" type="text" name="username" placeholder="Masukkan Username Anda" />
            <label for="login-input-password" class="login__label">
                Password
            </label>
            <input id="login-input-password" class="login__input" type="password" name="password" placeholder="Masukkan Password Anda" />
            <label for="login-input-user" class="login__label">
                Foto
            </label>
            <input name="nama_file" id="nama_file" type="file" class="login__input" />
            <button class="login__submit" type="submit">Sign Up</button>
        </form>
    </div>
</body>

</html>