<?php
        $db=mysqli_connect("localhost","root","","");
        if(!$db){
                echo "not connect.";
        }else{
            echo "connect successfully.";
        }
?>