<?php

function DB_Connect(){
    $link = mysqli_connect('localhost','root','','holiday');

    if ($link){
        echo "Connection to Database Succeed";
    }else{
        echo "Error during connection";
    }
    return $link;
}
