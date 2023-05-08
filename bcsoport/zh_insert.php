
    
<?php
	include 'getdb.php';
   
	if(isset($_POST['uj']) and $_POST['nev'] and $_POST['kor'])
	{	
	$link=getdb();
 
	$nev=$_POST['nev'];
	$kor=$_POST['kor'];
	$insert_query=sprintf(
		"INSERT INTO arufeltolto(nev, kor) VALUES('%s', '%s')",
		mysqli_real_escape_string($link, $nev),
		mysqli_real_escape_string($link, $kor));
	mysqli_query($link, $insert_query);
	mysqli_close($link);

    $fizetes = isset($_GET['fizetes']) ? $_GET['fizetes'] : '';

    $redirect_url = "zh.php?fizetes=" . urlencode($fizetes);
	header("Location: $redirect_url");
    exit;
	}
    
    ob_start();
?>
<!DOCTYPE html>
<html>
    <body>
        <form action="zh_insert.php" method="post">
            <h1>Új ember</h1>
            <p>
                Név: <input type="text" name="nev" />    
            </p>
            <p>
                Életkor: <input type="text" name="kor" />    
            </p>
            <p> 
                <input type="submit" value="Elküld" name="uj" />
            </p>
        </form>
    </body>
</html>
<?php
ob_end_flush()
?>