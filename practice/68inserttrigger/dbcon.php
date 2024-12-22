<?php
    $db=mysqli_connect("localhost","root","","aarong");
    if(!$db){
        echo "not connect.";
    }else{
        echo "connect";
    }
?>