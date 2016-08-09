<?php
session_start();
include '../../Model/Database_Connect.php';
$link = DB_Connect();

$filequantity = count($_FILES['files']['name']);
echo "File quantity: ".$filequantity;

for ($i = 0; $i < $filequantity; $i++) {
    $name = $_FILES['files']['name'][$i];
    $tmpname = $_FILES['files']['tmp_name'][$i];
    $imagebase64 = base64_encode(file_get_contents($tmpname));
    $imagetype = $_FILES['files']['type'][$i];

    $iduser = $_SESSION['id_user'];
    $idalbum = 1;

    $statement = "Insert Into picture(id_user, id_album, filebase64_picture, type_picture) Values ($iduser, $idalbum, '$imagebase64', '$imagetype')";

    if (mysqli_query($link, $statement)){
        echo "File $name inserted. <br>";
    }
}

mysqli_close($link);



