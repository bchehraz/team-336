<?php
    include 'con/dbConnection.php';

    function getSongs($searchKey) {
        $dbConn = getDBConnection("music_db");
    
        $sql = "SELECT * FROM Song WHERE songName LIKE :songName ";
    
        $namedParameters[':songName'] = '%' . $searchKey . '%';
    
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $records;
    }

    function validate($value) {
       if(strlen($value) > 2){
           return "true";
       }else{
           return "false";
       }
    
    }
    
    function displayError($Error){
        echo $Error;
    }
 ?>
