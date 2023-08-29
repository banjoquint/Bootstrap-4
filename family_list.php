<?php

 // Getting $REQUEST METHOD
require_once $_SERVER['DOCUMENT_ROOT'].'/omygod/includes/manorfarm.php';
connect_sql();
print_r($_GET); 
//exit();
$sql = ('SELECT * from users WHERE ID = '. $_GET['userID']);
//$values = array($_GET['userID']);
//$row=selectA_Row($sql,$values);
//print_r($row);
//exit()
?>
<html>
   <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="css/styles.css"/>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <title>Edit User</title>
    </head>
    <body>
        <form>
            <?php 
            while ($row = $dbh->fetchcolumn($sql)) {
                echo $row;
            }
            ?>
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your user name with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="dateofbirth" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="dateofbirth">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck">Save Changes</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
   </body>
    
</html>
