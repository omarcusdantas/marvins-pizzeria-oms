<?php
    session_start();
    $user = "Insert user";
    $pass = "Insert password";
    $db = "Insert the name of the database";
    $host = "Insert the hostname on which the database server resides";

    try {
        $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    } 
    catch (PDOException $error) {
        print "Error: " . $error->getMessage() . "<br/>";
        die();
    }
?>