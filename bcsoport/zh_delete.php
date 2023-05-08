<?php
    require 'getdb.php';

    if(isset($_GET['id'])){
        $link=getdb();
        $id=mysqli_real_escape_string($link,$_GET['id']);
        $delete_guery=sprintf("DELETE FROM arufeltolto where id=%s",$id);
        mysqli_query($link,$delete_guery);
        mysqli_close($link);
    }

    header("Location: zh.php?=");
?>