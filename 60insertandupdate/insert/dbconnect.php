<?php
    $conn=mysqli_connect('localhost','root','','client');
    if(!$conn){
        echo "connection failed.";
    }else{
        echo "connect successful.";
    }
?>