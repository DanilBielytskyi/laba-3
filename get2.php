<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('connect.php');

$vendor_id = $_GET['vendor'];

try {
    $sqlSelect = "SELECT * FROM cars WHERE FID_Vendors = ?";

    $stmt = $dbh->prepare($sqlSelect);

    $stmt->bindValue(1, $vendor_id);
    $stmt->execute();
    $res = $stmt->fetchAll();

    echo "<table border='1'>";
    echo "<thead><tr><th>ID_Cars</th><th>Car Name</th><th>Release Date</th><th>Race</th><th>State</th><th>Price</th></tr></thead>";
    echo "<tbody>";

    foreach($res as $row)
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[6]</td></tr>";
    }
    
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