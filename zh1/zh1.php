<!DOCTYPE html>
<html>
  <head>
    <title>ZH1</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!--STYLE hozzáadása-->
  </head>
  <body>
    <h1>Kotan Tamas K424V1</h1>
    <p>This is some sample text.</p>
    
     <?php
        include 'db.php';
          
        $conn=getDB();
        $fizetes = $_GET['fizetes']; //url-ben megadott parameter kiszedese
        $result = mysqli_query($conn, "SELECT id, name, salary FROM product_suppliers where salary>$fizetes"); //urlben kapott parameter szerinti szures
      ?>

<?php if($fizetes>=100000) :?>           
        <table>               
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>  
                    <th>salary</th>   
                </tr>
            </thead>
            <?php while($row=mysqli_fetch_array($result)) :?>
            <tbody>
                <tr>
                    <td class="odd"><?=$row['id']?></td>
                    <td class="even"><?=$row['name']?></td>
                    <td class="odd"><?=$row['salary']?></td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
        <h3>A fizetés kisebb, mint 100000</h3>
        <?php endif; ?>

    <p>
          <a href="zh_insert.php" class="link">Új elem beszúrása</a>
    </p>

    <?php mysqli_close($conn);?>
  </body>
</html>




