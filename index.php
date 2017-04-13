<?php
    include 'scripts.php';
    
    global $success;
    if (isset($_GET['Search'])) {
        if(validate($_GET['name']) == true){
            if(validate($_GET['filter']) == true){
                $success = true;
                if (validate($_GET['sortPref']) == true) {
                    $success = true;
                    
                    //store the name, filter, and sorting preference
                    $_SESSION['search_name'] = $_GET['name'];
                    $_SESSION['search_filter'] = $_GET['filter'];
                    $_SESSION['search_sort'] = $_GET['sortPref'];
                }
                
            }else{
                displayError("Please make sure to select a search filter!");
                $success = false;
            }
        } else if (empty($_GET['name'])) { //if name is simply empty, do a search based on the other guidelines anyway
        
            if(validate($_GET['filter']) == true){
                $success = true;
                if (validate($_GET['sortPref']) == true) {
                    $success = true;
                    
                    //store the name, filter, and sorting preference
                    $_SESSION['search_name'] = $_GET['name'];
                    $_SESSION['search_filter'] = $_GET['filter'];
                    $_SESSION['search_sort'] = $_GET['sortPref'];
                }
                
            }else{
                displayError("Please make sure to select a search filter!");
                $success = false;
            }
            
        }else{ //enforcement of a minimum of 3 characters
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
            //return getOutputToScreen(getSongs($db, $_GET["sortPref"], $_GET['SearchMusic']));
            return getOutputToScreen(getSongs($_GET["name"], $_GET["sortPref"], $_GET["filter"]));
        } else {
            return getOutputToScreen(getSongs("", "", ""));
        }
    }
    
    function Test(){
        return "FACK";
    }
    
    //these functions return the session's last searched parameters and saves them into the form instead of resetting
    function getLastSearch() {
        return isset($_SESSION["search_name"]) ? $_SESSION["search_name"] : "";
    }
    
    function getPrefFilter($filter) {
        return isset($_SESSION["search_filter"]) && $_SESSION["search_filter"] == $filter ? "selected" : "";
    }
    
    function getPrefSort($sort) {
        return isset($_SESSION["search_sort"]) && $_SESSION["search_sort"] == $sort ? "selected" : "";
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
                Search Music: <input type="text" name="name" value="<?=getLastSearch()?>"/>
          Search Filters:<select name="filter">
                           <option value="song" <?=getPrefFilter("song")?>>Song</option>
                           <option value="artist" <?=getPrefFilter("artist")?>>Artist</option>
                           <option value="genre" <?=getPrefFilter("genre")?>>Genre</option>
                         </select>
                Order: <select name="sortPref">
                        <option value="ASC" <?=getPrefSort("ASC")?>>Ascending</option>
                        <option value="DESC" <?=getPrefSort("DESC")?>>Descending</option>
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