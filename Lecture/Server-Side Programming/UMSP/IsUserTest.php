<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    include "UMSP.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){

    } else if ($_SERVER['REQUEST_METHOD'] == "GET"){
        $userId = $_GET['userid'];

        if (IsUser($userId) == True){
            echo 'Successful!';
        } else {
            echo 'Failed!';
        }
    } else {

    }
?>

</body>
</html>