<?php
function getSongs(searchKey) {
    global $dbConn;

    $sql = "SELECT * FROM Song WHERE songName LIKE :songName ";


    $namedParameters[':songName'] = '%' . $_GET['name'] . '%';

    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;

}
 ?>
