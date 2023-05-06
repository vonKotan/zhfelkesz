<?php
    function getDB()
    {
        $conn = mysqli_connect("localhost", "root","")
           or die("db connection error: " . mysqli_error());
        mysqli_select_db($conn, "test"); /*Watch the name*/
        mysqli_query($conn, "set character_set_results='utf8'");
        
        return $conn;

    }

?>