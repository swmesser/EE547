<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserAdd</title>
    <script src="UserAdd.js"></script>
</head>
<body>

    <?php 
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $logTime = date('Y/m/d H:i:s');
            
            // no checking to see if fields are correct or exist already
            $userFile = fopen('users.csv','a');
            if ($userFile == NULL){
                echo 'Error: Failed to open file';
            } else {
                fprintf($userFile,"%s,%s,%s,%s\n", $fname, $lname, $email, $logTime);  
                fclose($userFile);

                echo "Welcome " . $fname . "!";
            }

        } else {
            echo "Request method not yet supported!";
        }
    ?>

</body>
</html>