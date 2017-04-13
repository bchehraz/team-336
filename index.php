<?php
    include 'scripts.php';
    global $success;
    if (isset($_GET['Search'])) {
        if(validate($_GET['name']) == true){
            if(validate($_GET['SearchMusic']) == true){
                $success = true;
            }else{
                displayError("Please make sure to select a search filter!");
                $success = false;
            }
        }else{
            displayError("Please make sure you enter more than 3 characters into the search!");
            $success = false;
        }

        //$searchKey = $_GET["name"];
        //getSongs($searchKey);
    }
    function displayList(){
        global $success;
        if(isset($_GET['Search']) && $success){
            //getSongs($searchKey); output an array into this function
            return getOutputToScreen(array("Song1", "Song2", "Song3"), $_GET['SearchMusic']);
        }
    }
    
    function Test(){
        return "FACK";
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
        <div id="content">
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
            <div id="SearchList">
                <table width='100%' style='text-align:center'>
                    <?=displayList()?>
                </table>
            </div>
            <br />
            <hr>
            <br />
        </div>
    </body>
</html>