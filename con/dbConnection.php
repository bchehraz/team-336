<?php
//include '../inc/credentials.php';




function getDBConnection($dbname) {
    $host = "localhost";
    
    $username = "web_user";
    $password = "s3cr3t";
    try {
        //Creating database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        
        echo "There was an error connecting to the database! Error: $e";
        exit();
        
    }
    
    return $dbConn;
    
}


?>