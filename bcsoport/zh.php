<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="zh.css">
    </head>
    <body>
    <?php
        echo'<div id =szemelyes>Neptun kód:DMOXZA, Név:Epres Tamás</div>';

        require 'getdb.php';
        $fizetes=$_GET['fizetes'];
        if(isset($fizetes)){
            if($fizetes>=100000)
            {
            
            $link=getdb();
            $query=sprintf("SELECT arufeltolto.id as id ,arufeltolto.nev as nev, count(kisbolt_id)as count,sum(kisbolt.terulet) as sum
            from arufeltolto
            inner join kisbolt on kisbolt.id=arufeltolto.kisbolt_id
            where arufeltolto.fizetes>%s
            group by arufeltolto.nev
            ",mysqli_real_escape_string($link,$fizetes));
            $result=mysqli_query($link,$query);

            echo'
                <table>
                    <tr>
                    <th>Arúfeltoltö</th>
                    <th>Boltokszama</th>
                    <th>Terület összege</th>
                </tr>';

            while($row=mysqli_fetch_array($result))
            {
                echo
                    '<tr>
                    <td>'.$row['nev'].'</td>
                    <td>'.$row['count'].'</td>
                    <td>'.$row['sum'].'</td>
                    <td><a href ="zh_delete.php?id='.$row['id'].'">Elem törlése</a></td>
                    </tr>';
                    
            }
            echo '</table>
            <a href="zh_insert.php?fizetes='.urlencode($kor).'">Új elem beszúrása</a>';
            
            mysqli_close($link);
            }

            else{
                echo '<h2>Tul pici a bemeneti összeg</h2>';
            }
        }
        else{
            echo '<h2>Nincsen GET paraméter</h2>';
        }
    ?>
    </body>
</hmtl>