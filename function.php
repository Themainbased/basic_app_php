<?php
$host       = 'localhost'; // host
$username   = 'root'; // username database
$password   = ''; // password database
$dbname     = 'phptest'; // nama database

$db = mysqli_connect($host, $username, $password, $dbname);

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


function tambah($data)
{
    global $db;
    $no = htmlspecialchars($data["handphone"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kelas = htmlspecialchars($data["kelas"]);


    $query = "INSERT INTO test
                    VALUES
                    ('', '$no', '$nama', '$alamat', '$kelas')
                    ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM test WHERE id = $id");
    return mysqli_affected_rows($db);
}



function ubah($data)
{

    global $db;

    $id = $data["id"];
    $handphone = htmlspecialchars($data["handphone"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kelas = htmlspecialchars($data["kelas"]);

    $query = "UPDATE test SET
    handphone = '$handphone', nama = '$nama',  alamat = '$alamat', kelas = '$kelas'
    WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function cari($keyword)
{
    $query = "SELECT * FROM test
        WHERE 
        nama LIKE '%$keyword%' OR
        handphone LIKE '%$keyword%' OR
        alamat LIKE '%$keyword%' OR
        kelas LIKE '%$keyword%' 
        ";
    return query($query);
}


function registrasi($data)
{
    global $db;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    //cek data yang sama dalam database
    $result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username dah ada  ');    
        </script>
        ";

        return false;
    }


    if ($password !== $password2) {
        echo "<script>
                alert('Failed To Registry');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($db, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($db);
}
