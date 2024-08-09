<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserView</title>
</head>
<body>
    <?php 
        // GET or POST? ( GET simple )
        // Capture the ID from the $_GET
        // Get the info from the file (datasource)
        // loop through or search
        // generate the HTML --> client
        //  sorry, user does not exist
        //  labels + inputs (readonly)

        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            if (( isset($_GET['userId']) == true && strlen($_GET['userId']) > 0 )){
                $userId = $_GET['userId'];

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
                        echo "<label for='userId'>User Id: </label>";
                        echo "<input type='text'  id='userId' readonly='readonly' value='". $chunks[0] ."'/> <br>";
                        echo "<label for='fname'>Firstname: </label>";
                        echo "<input type='text'  id='fname' readonly='readonly' value='". $chunks[1] ."'/> <br>";
                        echo "<label for='lname'>Lastname: </label>";
                        echo "<input type='text'  id='lname' readonly='readonly' value='" . $chunks[2] ."'/> <br>";
                        echo "<label for='email'>Email: </label>";
                        echo "<input type='text'  id='email' readonly='readonly' value='" .$chunks[3] ."'/> <br>";
                        echo "<label for='datetime'>Datetime: </label>";
                        echo "<input type='text'  id='datetime' readonly='readonly' value='" .$chunks[4] ."'/> <br>";
                    }else{
                        echo "Warning: User not found!";
                        echo "<br> <a href='/UMS/UserAdd.html'>Add User!</a>";
                    }
                }
            } else {
                echo "Error: No email was passed!";
            }
            
        } else {
            echo "Error: Request method not handled yet!";
        }


        
    ?>
</body>
</html>