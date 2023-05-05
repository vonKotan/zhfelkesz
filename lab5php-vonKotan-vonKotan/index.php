<!DOCTYPE html>
<html>
    <head>
        <title>Telefonkönyv</title>
       <link rel="stylesheet" type="text/css" href="theme.css">   
    </head>
    <body>
        <h1>Telefonkönyv</h1>
        <?php
            include 'db.php';
            $conn = getDB();
            $result = mysqli_query($conn, "SELECT id, nev, szam FROM telefonkonyv");
        ?>
        <table>

            <tr>
                <th>ID</th>
                <th>Név</th>
                <th>Telefon</th>      
            </tr> 
            <?php while($row = mysqli_fetch_array($result)) :?>
                <tr>
                    <td><?=$row['id']?> </td>
                    <td><?=$row['nev']?> </td>
                    <td><?=$row['szam']?> </td>
                    <td> <a href="delete.php?id=<?=$row['id']?>">DELETE</a> </td>

                </tr>
            <?php endwhile?>
        </table>
        <p>
           <a href="insert.php">Új elem beszúrása</a>
        </p>
        <?php mysqli_close($conn);?>
    </body>
</html>
