<?php
   $connect=mysqli_connect('localhost','root','','info_student');
   if(!$connect){
        echo "connection failed.";
   }else{
    echo "database connect successful.";
   }
        
?>