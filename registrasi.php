<?php

require 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('Sudah berhasil terdaftar');
        </script>";
    } else {
        echo mysqli_error($db);
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Resigistrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>

    <h1>Registry Home</h1>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </li>

            <li>
                <label for="username">Confirm Password</label>
                <input type="password" name="password2" id="password2">
            </li>

            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>




</body>

</html>