<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../../Assets/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../../../Assets/materialize/css/materialize.min.css" rel="stylesheet">
    <link href="../../../Assets/materialize/css/materialize.css" rel="stylesheet">

    <title>Holiday</title>
    <style>
        p {
            font-family: "Segoe UI Light";
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../Home/Home.php">Holiday</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="Findpicture.php">Compare Pictures</a></li>
            <li>
                <a href="#">
                    <?php echo $_SESSION['username'] ?>
                </a>
            </li>
            <li><a href="../../Model/Login/Logout.php">Log out</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <ul class="collapsible popout" data-collapsible="accordion">
        <li>
            <div class="collapsible-header active light-blue darken-2">
                <i class="material-icons" style="color: #FFD201; font-size: 24px">folder</i>
                <p style="color: #fff; font-size: 24px; font-family: 'Segoe UI Light'">Pictures Folder</p>
            </div>
            <div class="collapsible-body grey lighten-4">
                <p class="flow-text" style="font-size: 20px">
                    Select a picture from your Pictures folder. We will then obtain the entire folder content.
                </p>

                <form class="row" action="../../Model/Compare/Findpicture.php" method="post" enctype="multipart/form-data">
                    <div class="col-sm-offset-1 col-sm-10 input-field file-field">
                        <div class="btn light-blue darken-2">
                            <span>Find Picture</span>
                            <input type="file" name="files[]" multiple>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="col-sm-offset-11 col-sm-1">
                        <button type="submit" class="btn-floating btn-large waves-effect waves-light pink">
                            <i class="material-icons right">done</i>
                        </button>
                    </div>
                </form>

            </div>
        </li>
        <li>
            <div class="collapsible-header active pink">
                <i class="material-icons" style="color: #E3E3E3; font-size: 24px">party_mode</i>
                <p style="color: #fff; font-size: 24px; font-family: 'Segoe UI Light'">Favorite Pictures</p>
            </div>
            <div class="collapsible-body grey lighten-4">
                <p class="flow-text" style="font-size: 20px">
                    Select a picture from your Pictures folder. We will then obtain the entire folder name.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header active teal accent-4">
                <i class="material-icons" style="color: #fff; font-size: 24px">share</i>
                <p style="color: #fff; font-size: 24px; font-family: 'Segoe UI Light'">Share Collection</p>
            </div>
            <div class="collapsible-body grey lighten-4">
                <p class="flow-text" style="font-size: 20px">
                    Select a picture from your Pictures folder. We will then obtain the entire folder name.
                </p>
            </div>
        </li>
    </ul>
</div>

<script src="../../../Assets/jquery/jquery-2.2.3.js"></script>
<script src="../../../Assets/materialize/js/materialize.js"></script>
<script src="../../../Assets/materialize/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.collapsible').collapsible({
            accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
    });
</script>
</body>
</html>