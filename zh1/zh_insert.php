<!DOCTYPE html>
<html>
    <head><title>Eladó</title></head>
    <link rel="stylesheet" type="text/css" href="style.css"> <!--STYLE hozzáadása-->
    <body>
        <form action="zh_insert.php" method="post">
            <h1>Új telefonszám</h1>
            <p>
                Név: <input type="text" name="name" />    
            </p>
            <p>
                Életkor: <input type="text" name="salary" />    
            </p>
            <p> 
                <input type="submit" value="Elküld" name="uj" />
            </p>
        </form>
    </body>
</html>

<?php           //insert
    include 'db.php';
    if(isset($_POST['uj']) and isset ($_POST['name']) and $_POST['salary'])     //ellenőrizni, hogy minden mező ki van-e töltve
    {
        $conn = getDB();
        $name =$_POST['name'];      //beszúrandó változók
        $salary = $_POST['salary'];
        $insert_query =sprintf("INSERT INTO sellers(name,salary) VALUES ('%s', '%d')", //beszúrás
        mysqli_real_escape_string($conn, $name),
        mysqli_real_escape_string($conn, $salary));
        
        mysqli_query($conn, $insert_query);
        mysqli_close($conn);
        header("Location: zh1.php?fizetes=100001");         //visszateresi link
    }

?>
