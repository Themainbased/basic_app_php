<?php

$host       = 'localhost'; // host
$username   = 'root'; // username database
$password   = ''; // password database
$dbname     = 'phptest'; // nama database

$db = mysqli_connect($host, $username, $password, $dbname);

$result  =  mysqli_query($db, "SELECT * FROM test");



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
    <h1>Daftar user</h1>

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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">ubah</a> | <a href="">hapus</a>
                </td>

                <td><?= $row["handphone"]; ?> </td>

                <td><?= $row["nama"]; ?></td>

                <td><?= $row["alamat"]; ?></td>

                <td><?= $row["kelas"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endwhile; ?>


    </table>


</body>


</html>