<?php
include 'scripts.php';
include 'con/dbConnection.php';
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
        
        <form>
            
            Search Music: <input type="text" name="name"/>
      Search Filters:<select name="Search Music">
                       <option value="">Select One</option>
                       <option value="artist">Artist</option>
                       <option value="song">Artist</option>
                       <option value="genre">Artist</option>
                     </select>
                
                     <input type="submit" value="Search" />
            
            
            
        </form>
        <br />
        <hr>
        <br />
    </body>
</html>