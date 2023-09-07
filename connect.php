<?php
declare(strict_types=1);

function db_connect(): object
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "techjam";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die ("Fout bij het maken van de connection: " . $e->getMessage());
    }
    return $conn;
}

