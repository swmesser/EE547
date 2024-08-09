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
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];
        $email = $_GET['email'];
        $datetime = date("Y/m/d h:i:sa");

        if (AddUserWithAll($userId, $fname, $lname, $email, $datetime) == True){
            echo "Successful!";
        }else {
            echo "Failed!";
        }
    } else {

    }
?>

</body>
</html>