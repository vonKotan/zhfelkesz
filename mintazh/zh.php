<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="zh.css" />
	</head>
	<body>
		<div id="nev_es_neptun"> 
			<p>Név: Killin Beáta, Neptun kód: G3QZUO </p>
		</div>
		<?php	
			$conn = mysqli_connect("localhost","root","") or die ("Connection error: ".mysqli_error());
			mysqli_select_db($conn, "zh");
			mysqli_query($conn, "set character_set_results='utf8'");
			if(isset($_GET['fajta'])){
			$faj="";
				switch ($_GET['fajta']) {
					case "vizilo":
						$faj="víziló";
						break;
					case "zsiraf":
						$faj="zsiráf";
						break;
					case "panda":
						$faj="panda";
						break;
				}
				$result = mysqli_query($conn, "SELECT Allat.ID, Allat.Nev, MIN(Gondozo.Kor) FROM Allat 
																INNER JOIN Gondozas ON Allat.ID=Gondozas.AllatID 
																INNER JOIN Gondozo ON Gondozas.GondozoID=Gondozo.ID 
																WHERE Allat.Faj='".$faj."'
																GROUP BY Allat.ID
																ORDER BY Allat.Nev");
			}
		?>
		<?php if(isset($_GET['fajta']) and $faj<>"") : ?>
				<table>
					<thead>
						<tr>
							<th>Azonosító</th>
							<th>Név</th>
							<th>Legfiatalabb</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row=mysqli_fetch_array($result)) : ?>
								<tr>
									<td><?=$row['ID']?></td>
									<td><?=$row['Nev']?></td>
									<td><?=$row['MIN(Gondozo.Kor)']?></td>
								</tr>
						<?php endwhile ?>
					</tbody>
				</table>
		<?php else : ?>
			<div id="hiba">
				<p> Nincs faj megadva! </p>
			</div>
		<?php endif; ?>
	</body>
	<?php mysqli_close($conn); ?>
</html>