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
            <table id="List" width='100%' style='text-align:center'>
                <thead>
                    <tr>
                        <th>Cover Art</th>
                        <th colspan="2">Song</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $input = array("Song1", "Song2", "Song3");
                    
                     for($i = 0; $i < count($input); $i++): 
                        
                    ?>
                    <tr class="hover">
                       
                        <td width = '100'>
                            <img src='img/CoverArt/default.png' width='100' alt='Missing Cover Art'>
                        </td>
                        <td colspan="2">
                            <?php echo $input[$i]; ?>
                        </td>
                    </tr>
                    <tr id="second">
                        <td>
                             Artist Name
                        </td>
                        <td>
                             Genre
                        </td>
                        <td>
                             Link
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
            <div>
            <script>
            function addRowHandlers() {
                var table = document.getElementById("List");
                var rows = table.getElementsByTagName("tr");
                for (i = 0; i < rows.length; i++) {
                    var currentRow = table.rows[i];
                    var next = table.rows[i+1];
                    var createClickHandler = 
                        function(row, nextrow) 
                        {
                            return function() { 
                                var cell = nextrow.getElementsByTagName("td")[0];
                                        var id = cell.innerHTML;
                                                    var hidden = nextrow;
                                                    id = id.toString().replace(" ","");;
                                                    if(nextrow.id == "second"){
                                                         if(hidden.offsetParent === null ){
                                                            hidden.style.display = "table-row"
                                                        
                                                        }else{
                                                        
                                                            hidden.style.display = "none";
                                                                     
                                                        }
                                                    }
                                             };
                        };
            
                    currentRow.onclick = createClickHandler(currentRow, next);
                    
                }
            }
            window.onload = addRowHandlers();
        </script>
</div>
        </div>
          
            <br />
            <hr>
            <br />
        </div>
    </body>
</html>