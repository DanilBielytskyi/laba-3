<?php
$dsn = "mysql:host=localhost;dbname=lb3_var_6";
$user = 'root';
$pass = '';

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $ex) {
    echo $ex->GetMessage();
}
?>