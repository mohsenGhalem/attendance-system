<html lang="en">
<?php
$host = 'localhost';
$db = 'attendance';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";


try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {/* mandatory to put inside */
    throw new PDOException($e->getMessage());
    echo "<h2 class='text-danger' >there is no db found</h2>";
} //throw =< will stoop the entire execution if there is an error 

require 'crud.php';
$crud = new crud($pdo);
?>