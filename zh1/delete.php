<?php
    include 'db.php';
    if(isset($_GET['id'])) {
        $conn = getDB();
        $id = $_GET['id'];
        $delete_query = sprintf("DELETE FROM telefonkonyv WHERE id=%d", $id);
        mysqli_query($conn, $delete_query);
        mysqli_close($conn);
    }
    header("Location: index.php");
?>