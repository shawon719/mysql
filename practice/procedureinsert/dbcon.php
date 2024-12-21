<?php
        $db=mysqli_connect("localhost","root","","company1");
        if(!$db){
                echo "not connect.";
        }else{
            echo "connect successfully.";
        }
?>