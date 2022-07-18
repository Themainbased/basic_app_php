<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}






require 'function.php';
$test = query("SELECT * FROM test ORDER BY id DESC");
if (isset($_POST["cari"])) {
    $test = cari($_POST["keyword"]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>
</head>

<body>

    <a href="logout.php">logout</a>

    <h1>Daftar user</h1>
    <a href="tambah.php">Tambah data</a>

    <form action="" method="POST">
        <input type="text" name="keyword" autofocus placeholder="search here" autocomplete="off">
        <button type="submit" name="cari">Search</button>
    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>No. Handphone</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kelas</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($test as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
                </td>

                <td><?= $row["handphone"]; ?> </td>

                <td><?= $row["nama"]; ?></td>

                <td><?= $row["alamat"]; ?></td>

                <td><?= $row["kelas"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>


    </table>


</body>


</html>