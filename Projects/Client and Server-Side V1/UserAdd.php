<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserAdd</title>
    <script src="UserAdd.js"></script>
</head>
<body>

    <?php 
        include 'UMS.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userId = $_POST['userId'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $logTime = date('Y/m/d H:i:s');
            
            /*
            // no checking to see if fields are correct or exist already
            $userFile = fopen('users.csv','a');
            // TODO: Validate Fields
            if ($userFile == NULL){
                //die()
                echo 'Error: Failed to open file';
            } else {
                fprintf($userFile,"%s,%s,%s,%s,%s\n",$userId, $fname, $lname, $email, $logTime);  
                fclose($userFile);

                echo "Welcome " . $fname . "!";
            }
            */

            // Using functions in UMS.php 
            if (AddUserWithAll($userId, $fname, $lname, $email, $logTime) == null){
                echo "<p>Error: Unable to add this users!</p>";
            } else {
                echo "<p>Welcome " . $fname . "!</p>";
            }   


        } else {
            echo "Request method not yet supported!";
        }
    ?>

    <br>
    <button onclick="location.href='/UMS/Users.php'">Return to home</button>

</body>
</html>