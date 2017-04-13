<?php

    session_start();

    include 'con/dbConnection.php';
    include 'cart.php';
    function getSongs($searchKey, $sortPref, $filter) {
        $dbConn = getDBConnection("music_db");
        
        //SELECT * FROM artist NATURAL JOIN (SELECT * FROM song NATURAL JOIN genre) as songAndGenre WHERE artistName LIKE '%zep%' ORDER BY songName
        if ($filter == "song") {
            $sql = "SELECT * FROM artist NATURAL JOIN song WHERE songName LIKE :param ORDER BY songName " . $sortPref; //sortPref = ASC | DESC
        } else if ($filter == "artist") {
            $sql = "SELECT * FROM artist NATURAL JOIN song WHERE artistName LIKE :param ORDER BY songName " . $sortPref;
        } else if ($filter == "genre") {
            $sql = "SELECT * FROM genre NATURAL JOIN (SELECT * FROM song NATURAL JOIN artist) as songWithArtist WHERE genre LIKE :param ORDER BY songName " . $sortPref;
        } else {
            $sql = "SELECT * FROM artist NATURAL JOIN song ORDER BY songName ASC";
        }
        
    
        $namedParameters[':param'] = '%' . $searchKey . '%';
    
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $records;
    }

    function validate($value) {
       if(strlen($value) > 2){
           return true;
       }else{
           return false;
       }
    }
    
    function displayError($Error){
        echo $Error;
    }
    
    /*function getOutputToScreen(array $List, $title){
        $output = "
          <tr width = '100'>
            <th>Cover Art</th> 
            <th>".$title."</th> 
          </tr>
         ";
         
         
        for($i = 0; $i < count($List); $i++){
            
            
            
            $output = $output . "
                <tr class='table-tr'>
                    <td id='imagetd' width = '100'>
                        <img src='img/CoverArt/default.png' width='100' alt='Missing Cover Art'>
                    </td>
                    <td>".$List[$i]."</td>
                </tr>
               
            ";
        }
        return $output;
        
        
    }*/
    
    function getOutputToScreen(array $songs) {
        $output = "
            <tr width = '100'>
                <th>Cover Art</th>
                <th>Title</th>
            </tr>
        ";
        foreach($songs as $song) {

            
            $output = $output . "
                <tr>
                    <td id='imagetd' width = '100'>
                        <img src='img/CoverArt/default.png' width='100' alt='Missing Cover Art'>
                    </td>
                    <td onclick='showData()' >\"" . $song["songName"] . "\" by " . $song["artistName"] . " </td>
                </tr>
            ";
        }
        return $output;
    }
 ?>
