<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../../Assets/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>Holiday</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="Home.php">Holiday</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../Compare/Findpicture.php">Compare Pictures</a></li>
            <li>
                <a href="#">
                    <?php echo $_SESSION['username'] ?>
                </a>
            </li>
            <li><a href="../../Model/Login/Logout.php">Log out</a></li>
        </ul>
    </div>
</nav>

<?php
//Obtain album name and data
include '../../Model/Database_Connect.php';
$link = DB_Connect();

$idalbum = $_GET['album'];
$titlealbum = $_GET['title'];

$statement = "Select *
              From picture 
              Join album on album.id_album = picture.id_album
              WHERE picture.id_album = $idalbum";
$query = mysqli_query($link, $statement);

?>

<div class="container">
    <div class="panel panel-primary">
        <?php

        //If user HAS NO pictures into selected album
        if ($query->num_rows == 0) { ?>
            <div class="panel-heading">
                <h1><?php echo $titlealbum?></h1>
            </div>
            <div class="panel-body">
                <h2 style="color:#bbbbbb">Empty folder</h2>
            </div>
        <?php

        //If user HAS pictures into selected album
        }else{
            $queryresultaux = $query -> fetch_assoc();
            ?>
            <div class="panel-heading">
                <h1 class='text-center'><?php echo $queryresultaux['title_album'] ?></h1>
            </div>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><?php echo $queryresultaux['title_picture']?></h3>
                    </div>
                    <div class="panel-body">
                        <img src="../../../UserPictures/<?php echo $queryresultaux['file_picture']?>" class="img-thumbnail center-block" height="650">
                    </div>
                    <div class="panel-footer">
                        <p><?php echo $queryresultaux['description_picture']?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>

<script src="../../../Assets/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
<script src="../../../Assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>