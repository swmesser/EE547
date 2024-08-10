<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserDelete</title>
</head>
<body>
    
    

    <?php 
    // GET or POST? GET (simple)
    // Capture the ID from the GET
    // Open the file and remove user from the file
    //  brute force: copy everything but the user to remove and recopy back to source file  
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            if (( isset($_GET['userId']) == true && strlen($_GET['userId']) > 0 )){
                $userId = $_GET['userId'];

                $userFile = fopen("users.csv", "r");
                $newUsersFile = fopen("usersModified.csv", "w");
            
                if ($userFile == NULL ){
                    echo "Error: Failed to open file Users.csv!";
                }else if ($newUsersFile == NULL ){
                    echo "Error: Failed to open file usersModified.csv";
                
                } else{
                   
                    while(!feof($userFile)){
                        $line = fgets($userFile);
                        $chunks = str_getcsv($line);
                        
                        if (count($chunks) == 5){
                            if ( $userId == $chunks[0]){
                                //skip it
                            } else {
                                fprintf($newUsersFile, "%s,%s,%s,%s,%s\n", $chunks[0], $chunks[1], $chunks[2], $chunks[3], $chunks[4]);
                            }
                        }
                    }
                    
                    fclose( $userFile );
                    fclose( $newUsersFile );
                    
                    // user system commands to copy UsersModified --> users.csv
                    $usersModified = fopen("usersModified.csv", "r");
                    $userFile = fopen("users.csv", "w");

                    if (($usersModified == NULL) || ($userFile == NULL )){
                        echo "Error: Could not open users files!";
                    } else {
                        
                        while(!feof($usersModified)){
                           $line = fgets($usersModified);
                           $chunks = str_getcsv($line);

                           if (count($chunks) == 5){
                            fprintf($userFile, "%s,%s,%s,%s,%s\n", $chunks[0], $chunks[1], $chunks[2], $chunks[3], $chunks[4]);
                           }
                        }
                        
                    }
                    echo "<p>User ". $userId ." has been removed</p>";
                    fclose($usersModified);
                    fclose($userFile);
                    
                }
            } else {
                echo "Error: no value passed in the GET!";
            }
        
        } else {
            echo "Request method not handled yet!";
        }
    ?>
    
    <br>
    <button onclick="location.href='/UMS/Users.php'">Return to home</button>
</body>
</html>