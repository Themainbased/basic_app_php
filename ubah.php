<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}



require 'function.php';

$id = $_GET["id"];
$test = query("SELECT * FROM test WHERE id = $id")[0];




if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo
        " <script>
            alert('Data berhasil di Ubah');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal di Ubah');
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
        <input type="hidden" name="id" value="<?= $test["id"] ?>">
        <ul>
            <li>
                <label for="handphone">No Handphone</label>
                <input type="text" name="handphone" id="handphone" required value="<?= $test["handphone"]; ?>">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required value="<?= $test["nama"]; ?>">
            </li>
            <li>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" required value="<?= $test["alamat"]; ?>">
            </li>
            <li>
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" required value="<?= $test["kelas"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>
    </form>

</body>

</html>