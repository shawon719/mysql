<?php
    $conn=mysqli_connect('localhost','root','','');
    if(!$conn){
        echo "connection failed.";
    }else{
        echo "connect successful.";
    }
?>