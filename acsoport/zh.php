<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="zh.css">
    </head>
    <body>
    <?php
        echo'<div id =szemelyes>Neptun kód:DMOXZA, Név:Epres Tamás</div>';

        require 'getdb.php';
        $kor=$_GET['kor'];
        if(isset($kor)){
            if($kor>=30)
            {
            
            $link=getdb();
            $query=sprintf("SELECT takarito.nev as nev , count(epulet.id)as count, sum(epulet.emelet)as sum 
            from takarito 
            inner join epulet on epulet.id=takarito.epulet_id
            where takarito.kor>40
            group by takarito .nev
            ;",mysqli_real_escape_string($link,$kor));
            $result=mysqli_query($link,$query);

            echo'
                <table>
                    <tr>
                    <th>Takarító</th>
                    <th>Épületek száma</th>
                    <th>Emeletek összege</th>
                </tr>';

            while($row=mysqli_fetch_array($result))
            {
                echo
                    '<tr>
                    <td>'.$row['nev'].'</td>
                    <td>'.$row['count'].'</td>
                    <td>'.$row['sum'].'</td>
                    
                    </tr>';
                    
            }
            echo '</table>
            <div class =my-custom-class>
              <a href="zh_insert.php?kor='.$_GET['kor'].'">Új elem beszúrása</a>
            </div>';
            mysqli_close($link);
            }

            else{
                echo '<h2>Tul pici a bemeneti eletkor</h2>';
            }
        }
        else{
            echo '<h2>Nincsen GET paraméter</h2>';
        }
    ?>
    </body>
</hmtl>