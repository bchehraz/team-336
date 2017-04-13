<?php
//include '../inc/credentials.php';




function getDBConnection($dbname) {
    $host = "localhost";
    
    //This should work for you guys, it's the user account Dr. Lara wanted us to make for him to test our stuff. Forgot about it.
    $username = "zenitram56";
    $password = "";
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