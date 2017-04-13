<?php
    include 'con/dbConnection.php';

    function getSongs($searchKey) {
        $dbConn = getDBConnection("music_db");
    
        $sql = "SELECT * FROM song WHERE songName LIKE :songName ORDER BY songName";
    
        $namedParameters[':songName'] = '%' . $searchKey . '%';
    
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
    
    function getOutputToScreen(array $List, $title){
        $output = "
          <tr width = '100'>
            <th>Cover Art</th> 
            <th>".$title."</th> 
          </tr>
         ";
         
         
        for($i = 0; $i < count($List); $i++){
            
            
            
            $output = $output . "
                <tr>
                    <td id='imagetd' width = '100'>
                        <img src='img/CoverArt/default.png' width='100' alt='Missing Cover Art'>
                    </td>
                    <td onclick='showData()' >".$List[$i]."</td>
                </tr>
            ";
        }
        return $output;
    }
 ?>
