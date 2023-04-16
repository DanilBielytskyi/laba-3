<!DOCTYPE html>
<html>
<head>
	<title>LB_3</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<section>
		<form action="get1.php" method="get">
			<label for="date">Выберите дату:</label>
			<input type="date" name="date" id="date">
			<input type="submit" value="Get">
		</form>

		<form action="get2.php" method="get">
			<label for="vendor">Выберите производителя:</label>
			<select name="vendor" id="vendor">
				<?php
					include('connect.php');
					try {
						$stmt = $dbh->query("SELECT ID_Vendors, Name FROM vendors");
						$res = $stmt->fetchAll();

						foreach($res as $row)
						{
							echo "<option value='$row[0]'>$row[1]</option>";
						}
					}
					catch(PDOException $ex) {
						echo $ex->GetMessage();
					}

					$dbh = null;
				?>
			</select>
			<input type="submit" value="Get">
		</form>

		<form action="get3.php" method="get">
			<label for="date">Выберите дату:</label>
			<input type="date" name="date" id="date">
			<input type="submit" value="Get">
		</form>
	</section>
</body>
</html>
