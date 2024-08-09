<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserModify</title>
    <script src="User_add.js"></script>
</head>
<body>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if ((isset($_POST["mode"]) == true) && (isset($_POST['userId']) == true)){
            // what values make sense for the mode?
            //  changed
            //  selected
            $mode = $_POST["mode"];
            $userId = $_POST['userId'];

            if ($mode == 'selected'){
                $userFile = fopen("users.csv", "r");
                if ($userFile == NULL ){
                    echo "Error: Failed to open file!";
                } else{
                    // assumed that we can open the file
                    $found = false;
                    while (($found == false) && (!feof($userFile))) {
                        $line = fgets($userFile);
                        $chunks = str_getcsv($line);

                        if (count($chunks) == 5) {
                            if ( $chunks[0] == $userId ){
                                $found = true;
                            }
                        } else {
                            $log_file = fopen("log.txt", "a");
                            fprintf($log_file, "%s\n", "Error: Incorrect number of columns found in input file!");
                            fclose($log_file);
                        }

                    }
                    fclose($userFile);
                    
                    if ($found == true){
                        echo "<form action='UserModify.php' method='POST'>";
                        echo "<label for='userId'>User Id: </label>";
                        echo "<input type='text'  id='userId' name='userId' readonly='readonly' value='". $chunks[0] ."'/> <br>";
                        echo "<label for='fname'>Firstname: </label>";
                        echo "<input type='text'  id='fname' name='fname' value='". $chunks[1] ."'/> <br>";
                        echo "<label for='lname'>Lastname: </label>";
                        echo "<input type='text'  id='lname' name='lname' value='" . $chunks[2] ."'/> <br>";
                        echo "<label for='email'>Email: </label>";
                        echo "<input type='text'  id='email' name='email' value='" .$chunks[3] ."'/> <br>";
                        echo "<label for='datetime'>Datetime: </label>";
                        echo "<input type='text'  id='datetime' value='" .$chunks[4] ."'/> <br>";
                        echo "<input type='text' id='mode' name='mode' value='changed'/>";
                        echo "<input type='submit'/>";
                        echo "</form>";
                    }else{
                        echo "Warning: User not found!";
                        echo "<br> <a href='/UMS/UserAdd.html'>Add User!</a>";
                    }
                }
            } else if ($mode == 'changed'){
                //echo "<p>TODO: Changed</p>";
                //check if all additional fields were sent (a bit overkill)
                if ((isset($_POST['fname']) == true) && (isset($_POST['lname']) == true) && (isset($_POST['email']) == true)){
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    // validate (HTML special characters, email, etc)
                    // open file, check if the userId exist, edit file (make new one and copy back to original)
                    // TODO...

                    echo "<p>Change Successful!</p>";
                } else {
                    echo "<p>Error: No editable field names/values were provided!</p>";
                }
            } else {

            }
        } else {

        }
    }else {
        // consider supporting other request methods
    }

    ?>
</body>
</html>