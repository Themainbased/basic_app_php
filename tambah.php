<?php


session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}


require 'function.php';


if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo
        " <script>
            alert('Data berhasil di tambahkan');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal di tambahkan');
        document.location.href = 'index.php';
    </script>";
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data themainbased</title>
</head>

<body>

    <h1>Tambah data</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="handphone">No Handphone</label>
                <input type="text" name="handphone" id="handphone" required>
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat">
            </li>
            <li>
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas">
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>

</body>

</html>