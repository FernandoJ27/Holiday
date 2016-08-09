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
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1>My Collection</h1>
        </div>
        <div class="panel-body">
            <?php
            //Query database looking for albums
            include '../../Model/Database_Connect.php';
            $link = DB_Connect();

            $iduser = $_SESSION['id_user'];
            $statement = "Select id_user, id_album, title_album From album WHERE id_user = $iduser";
            $query = mysqli_query($link, $statement);

            //If user has no albums.
            if ($query->num_rows == 0) { ?>

            <div class="jumbotron well well-lg">
                <h1 style="color: #9d9d9d">You have no albums</h1>
            </div>

            <?php
            } else { ?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Album name</th>
                    <th>Owner</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php while ($queryresult = $query->fetch_assoc()) { ?>
                    <tr style="font-size: 20px">
                            <td><i class="material-icons" style="color: #FFD201; font-size: 36px">folder</i></td>
                        <td><p style="margin-top: 5px"><?php echo $queryresult['title_album'] ?></p></td>
                        <td><p style="margin-top: 5px"><?php echo $_SESSION['username'] ?></p></td>
                        <td>
                            <a href="../Album/Album.php?album=<?php echo $queryresult['id_album']?>&title=<?php echo $queryresult['title_album']?>"
                                class="btn btn-info">
                                <i class="material-icons" style="font-size:24px">add_a_photo</i>
                            </a>
                            <a href="../Album/Album.php?album=<?php echo $queryresult['id_album']?>" class="btn btn-success">
                                <i class="material-icons" style="font-size:24px">photo_album</i>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col-sm-offset-10">
                    <button type="button" class="btn btn-primary btn-lg"> + New Album</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../../Assets/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
<script src="../../../Assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>