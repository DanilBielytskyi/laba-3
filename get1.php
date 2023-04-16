<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('connect.php');

$date = $_GET['date'];

try {
    $sqlSelect = "SELECT SUM(rent.Cost) 
                  FROM rent 
                  WHERE rent.Date_start <= ? AND rent.Date_end >= ?";

    $stmt = $dbh->prepare($sqlSelect);

    $stmt->bindValue(1, $date);
    $stmt->bindValue(2, $date);
    $stmt->execute();
    $res = $stmt->fetch();

    echo "<table border='1'>";
    echo "<thead><tr><th>Доход</th></tr></thead>";
    echo "<tbody>";
    echo "<tr><td>$res[0]</td></tr>";
    echo "</tbody>";
    echo "</table>";
}
catch(PDOException $ex) {
    echo $ex->GetMessage();
}

$dbh = null;
?>

</body>
</html>