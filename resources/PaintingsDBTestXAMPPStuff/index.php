<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="myStyleSheet.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container-fluid">
		<table class= "table">
			<thead>
				<tr>
					<th scope ="col">ID</th>
					<th scope ="col">Image</th>
					<th scope ="col">Artiste</th>
					<th scope ="col">Medium</th>
					<th scope ="col">Style</th>
				</tr>
			</thead>
			<?php
			include_once('ConnectionHome.php');		//Currently set to connect to the tafe adminer server

			//	IMAGES TABLE
			$sqlImages = "SELECT * FROM images";
			$stmtImages = $conn->prepare($sqlImages);
			$stmtImages->execute();

			while ($row = $stmtImages->fetch(PDO::FETCH_ASSOC)) 
			{
				include('@SelectFunctions.php');

				//	GET id's FOR EACH FORIEGN KEY
				$artistID = $row['artistID'];
				$mediumID = $row['mediumID'];
				$styleID = $row['styleID'];

				// SQL QUERIES
				#$sqlArt = "SELECT `name` FROM `artists` WHERE(`id` = ".$artistID.") ";
				$sqlArt = Query("name", "artists", $artistID);
				$sqlMedium = "SELECT `mediumtype` FROM `mediums` WHERE(`id` = ".$mediumID.") ";
				$sqlStyle = "SELECT `styletype` FROM `styles` WHERE(`id` = ".$styleID.") ";

				//	PREPARED STATEMENTS
				$stmtArt = $conn->prepare($sqlArt);
				$stmtMedium = $conn->prepare($sqlMedium);
				$stmtStyle = $conn->prepare($sqlStyle);

				//	EXECUTE PREPARED STATEMENTS
				$stmtArt->execute();
				$stmtMedium->execute();
				$stmtStyle->execute();

				// RESULT SETS
				$artRes = $stmtArt->fetch(PDO::FETCH_ASSOC);
				$medRes = $stmtMedium->fetch(PDO::FETCH_ASSOC);
				$styleRes = $stmtStyle->fetch(PDO::FETCH_ASSOC);

				echo '<tr>';
				echo '<td>' . $row['id'] . '</td>';
				echo '<td>' .
				'<img src = "data:image/png;base64,' . base64_encode($row['imagefile']) . '" width = "300px" height = "300px"/>'
				. '</td>';
				echo '<td>'. $artRes['name'].' </td>';
				echo '<td>'. $medRes['mediumtype'].' </td>';
				echo '<td>'. $styleRes['styletype'].' </td>';
				echo '</tr>';
			}
			?>
			</table>

			<?php 
				$directory = dirname(__DIR__)."\Images\\test\welcome.php";
				echo $directory;
				echo "<form action=\"$directory\"  method=\"post\">";
				echo "Name: <input type=\"search\" name=\"search\"><br>";
				echo "<input type=\"submit\">";
			echo "</form>";
			?>
				<!--<form action = "<?php //echo $directory?>" method='post'> -->
			<?php	
				//echo getcwd()."<br";
				echo __DIR__;
				//echo basename(__FILE__)."<br>";
				//echo basename(getcwd())."<br>";
				echo "<form action=\"".__DIR__."\\test\test.php\" method=\"post\" target=\"_blank\">";
				
				//echo "<form action=\"".basename(__FILE__)."\\test\welcome.php\" method=\"post\">";
				echo "<input type=\"search\" name=\"search\"><br>";
				echo "<input type=\"submit\">";
				echo "</form>";

				class dingus
				{
					public static function Test()
					{
						$relativeURL = null;

						return $relativeURL;
					}
				}

			?>
		</div>
	</body>
</html>