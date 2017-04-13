<?php
    include 'scripts.php';
    if (isset($_GET['Search'])) {
        if(validate($_GET['name']) == "true"){
            if(validate($_GET['SearchMusic']) == "true"){
                            echo "VALIDATED!";
            }else{
                displayError("Please make sure to select a search filter!");
            }
        }else{
            displayError("Please make sure you enter more than 3 characters into the search!");
        }

        //$searchKey = $_GET["name"];
        //getSongs($searchKey);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Team Project</title>
        <style>
            @import url("css/team.css");
        </style>
    </head>
    <body>
        <h1>Music Search</h1>
        
        <form id="SearchAction" action="" method="GET" enctype="multipart/form-data">
            Search Music: <input type="text" name="name"/>
      Search Filters:<select name="SearchMusic">
                       <option value="">Select One</option>
                       <option value="artist">Artist</option>
                       <option value="song">Song</option>
                       <option value="genre">Genre</option>
                     </select>
                
                     <input type="submit" value="Search" name="Search"/>
        </form>
        <br />
        <hr>
        <br />
    </body>
</html>