<!DOCTYPE html>
<html>
  <head>
    <title>ZH1</title>
    <link rel="stylesheet" type="text/css" href="theme.css">
  </head>
  <body>
    <h1>Kotan Tamas K424V1</h1>
    <p>This is some sample text.</p>
    
    <table>
      <tr>
        <th>id</th>
        <th>név</th>
        <th>fizetés</th>      
      </tr>
     <?php
        include 'db.php';

        if (isset($_GET['fizetes'])) {
          $fizetes = $_GET['fizetes'];
        } else {
          $fizetes = 0;
        }

        $result = getDB($fizetes);
        // Check if there are any records
        if (mysqli_num_rows($result) > 0) {
            // Output the data in a table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["salary"] . "</td>";
                echo "</tr>";
            }
        } else {
            // Output a message if there are no records
            echo "<tr><td colspan='3'>No records found.</td></tr>";
        }
      ?>
    </table>

  </body>
</html>
