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
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
$birthday = $_POST['birthday'];


//Inserting data into Database
$statement = "INSERT INTO user(name_user,lastname_user,email_user,password_user,brithday_user) 
                          VALUES ('$name','$lastname','$email','$password','$birthday')";
mysqli_query($link,$statement);
header('location: ../../View/Login/Login');

//Closing connection to Database
mysqli_close($link);
