<?php
session_start();
include '../../Model/Database_Connect.php';
$link = DB_Connect();

ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

$filequantity = count($_FILES['files']['name']);
echo "File quantity: ".$filequantity;

for ($i = 0; $i < $filequantity; $i++) {
    $name = $_FILES['files']['name'][$i];
    $tmpname = $_FILES['files']['tmp_name'][$i];
    $imagetype = $_FILES['files']['type'][$i];

    $imagebase64 = base64_encode(file_get_contents($tmpname));

    $iduser = $_SESSION['id_user'];
    $idalbum = 1;

    $statement = "Insert Into picture(id_user, id_album, filebase64_picture, type_picture) Values ($iduser, $idalbum, '$imagebase64', '$imagetype')";

    if (mysqli_query($link, $statement)){
        echo "File $name inserted.<br>";
    }else{
        echo "Error while inserting<br>";
        echo "File lenght: ".strlen($imagebase64);
    }
}

mysqli_close($link);



