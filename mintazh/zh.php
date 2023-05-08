<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="zh.css">
  </head>
  <body>
        <tr>
        <h1>Név : Epres Tamás, Neptun kód : DMOXZA</h1>
        </tr>
    
<?php
    require 'db.php';
    $fajta=$_GET['fajta'];
    if (isset($fajta)){
        $link=getdb();
        
        $query=sprintf("SELECT Allat.id as id, Allat.nev as nev, min(Gondozo.kor) as kor
        FROM Allat
        left outer JOIN Gondoz on Gondoz.Allat_id=Allat.id
        left outer join Gondozo on Gondozo.id=Gondoz.Gondozo_id
        WHERE fajta='%s'
        group by Allat.id
        order by Allat.nev asc
        ", mysqli_real_escape_string($link,$fajta) );

        $result=mysqli_query($link,$query);
    }
    else{
        echo '<div id="warning">Nincsen GET paraméterem</p>';
    }
    if(mysqli_num_rows($result)>0){
        echo '<table>
                <tr>
                <th>Állat azonosítója</th>
                <th>Állat neve</th>
                <th>Legfiatalabb</th>
            </tr>';
        while($row=mysqli_fetch_array($result)){
            echo
                '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nev'].'</td>
                    <td>'.$row['kor'].'</td>
                </tr>';
                
            }
            echo
                '</table>';
        mysqli_close($link);
    }
    else{
        echo '<div id="warning">Nincsen adat</div>';
    }

    ?>
    </body>
</html>