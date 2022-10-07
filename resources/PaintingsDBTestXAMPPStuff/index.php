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
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Image</th>
					<th scope="col">Year</th>
					<th scope="col">Artist</th>
					<th scope="col">Medium</th>
					<th scope="col">Style</th>
				</tr>
			</thead>
			<?php
			include_once('ConnectionHome.php');		//Currently set to connect to the tafe adminer server

			//	IMAGES TABLE
			$sqlImages = "SELECT * FROM paintings";
			$stmtImages = $conn->prepare($sqlImages);
			$stmtImages->execute();

			while ($row = $stmtImages->fetch(PDO::FETCH_BOTH)) {
				echo '<tr>';
				echo '<td>' . $row['id'] . '</td>';
				echo '<td>' .
					'<img src = "data:image/png;base64,' . base64_encode($row['imagefile']) . '" width = "300px" height = "300px"/>'
					. '</td>';
				echo '<td>' . $row['year'] . ' </td>';
				echo '<td>' . $row['artist'] . ' </td>';
				echo '<td>' . $row['medium'] . ' </td>';
				echo '<td>' . $row['style'] . ' </td>';
				echo '</tr>';
			}
			?>
	</div>
</body>

</html>