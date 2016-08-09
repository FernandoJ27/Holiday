<?php
/**
 * Created by PhpStorm.
 * User: Fernando
 * Date: 03/08/2016
 * Time: 09:24 AM
 */

//Database Connection
include '../Database_Connect.php';
$link = DB_Connect();

//Parameters Retrieving
$email = $_POST['email'];
$password = $_POST['password'];


//Checking existing E-mail
$statement = "Select password_user,name_user,lastname_user,email_user,id_user From user WHERE email_user = '$email'";
$query = mysqli_query($link,$statement);
if ($query->num_rows != 0){
    //Verifying password
    $queryresult = $query -> fetch_assoc();
    if (password_verify($password,$queryresult['password_user']) == 1){
        echo "Successfully logged in";
        session_start();
        $_SESSION['username']= $queryresult['name_user'].' '.$queryresult['lastname_user'];
        $_SESSION['id_user'] = $queryresult['id_user'];

        header("location: ../../View/Home/Home.php");
    }else {
        echo "Wrong password";
        header("location: ../../View/Login/Login");
    }

}else{
    echo "User doesn't exist";
    header("location: ../../View/Login/Login");
}

//Closing connection to Database
mysqli_close($link);
