<!DOCTYPE html>
<html>
    <head><title>Telefonkönyv</title></head>
    <body>
        <form action="insert.php" method="post">
            <h1>Új telefonszám</h1>
            <p>
                Név: <input type="text" name="nev" />    
            </p>
            <p>
                Telefonszám: <input type="text" name="szam" />    
            </p>
            <p> 
                <input type="submit" value="Elküld" name="uj" />
            </p>
        </form>
    </body>
</html>

<?php
    include 'db.php';
    if(isset($_POST['uj']) and isset ($_POST['nev']) and $_POST['nev'])
    {
        $conn = getDB();
        $nev =$_POST['nev'];
        $szam = $_POST['szam'];
        $insert_query =sprintf("INSERT INTO telefonkonyv(nev,szam) VALUES ('%s', '%s')",
        mysqli_real_escape_string($conn, $nev),
        mysqli_real_escape_string($conn, $szam));
        
        mysqli_query($conn, $insert_query);
        mysqli_close($conn);
        header("Location: index.php");
    }

?>
