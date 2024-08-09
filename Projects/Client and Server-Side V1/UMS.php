<?php

class User {
    public $userid;
    public $fname;
    public $lname;
    public $email;
    public $datetime;

    public function isValid() {
        return true;
    }

    public function toCSV() {
        $csv = $this->userid . "," . $this->fname .",". $this->lname .",". $this->email .",". $this->datetime;
        return $csv;
    }

    public function toHTML() {
        return "";
    }
}

function GetUser(string $userid) {
    $file = fopen("users.csv","r");
    $user = NULL;

    if ($file == NULL) {
        LogMessage("Error: Failed to open Users.csv!");
    } else {
        // loop through the file, looking for the email address
        $found = false;
        while (($found == false) && (!feof($file))) {
            $line = fgets($file); // get a single line from the file.
            $chunks = str_getcsv($line);
            if (count($chunks) == 5) {
                if ($chunks[0] == $userid) {
                    $found = true;
                } else {
                    // does not match
                }
            } else {
                // log to the server that there was an incorrect number of columns found
                LogMessage("Error: Incorrect number of columns found in input file!");
            }
        }
        fclose($file);

        if ($found == false) {
            // User does not exist.  Either return NULL or .exists = false;
        } else {
            $user = new User();
            $user->userid = $chunks[0];
            $user->fname = $chunks[1];
            $user->lname = $chunks[2];
            $user->email = $chunks[3];
            $user->datetime = $chunks[4];
        }
    }
    return $user;
}

function AddUserWithAll(string $userid, string $fname, string $lname, string $email, string $datetime ) {
    $user = new User();

    $user->userid = $userid;
    $user->fname = $fname;
    $user->lname = $lname;
    $user->email = $email;
    $user->datetime = $datetime;

    return (AddUser($user));
}
function AddUser(User $user) {
    $successful = false;

    if ($user->isValid() == true) {
        if (GetUser($user->userid) == NULL) {
            $file = fopen("Users.csv", "a");
            if ($file == NULL) {
                LogMessage("Error: Failed to open Users.csv!");
            } else {
                fprintf($file, "%s\n", $user->toCSV());
                $successful = true;
                fclose($file);
            }
        } else {
            // return false;
        }
    } else {
        // return false;
    }
    return $successful;
}

function UpdateUser(User $user) {
    $successful = false;
    $output = "";

    if ($user->isValid() == true) {
        $file = fopen("users.csv", "r");
        if ($file == NULL) {
            LogMessage("Error: Failed to open Users.csv!");
        } else {
            $found = false;
            while (!feof($file)) {
                $line = fgets($file);
                $chunks = str_getcsv($line);
                if (count($chunks) == 5) {
                    if ($chunks[0] == $user->userid) {
                        $found = true;
                        $output = $user->toCSV() . "\n";
                    } else {
                        $output .= $line;
                    }
                } else {
                    // log to the server that there was an incorrect number of columns found
                    LogMessage("Error: Incorrect number of columns found in input file!");
                    // optionally add it to the output (a.k.a. purge it)
                    $output .= $line;
                }
            }
            fclose($file);

            if ($found == true) {
                $file = fopen("Users.csv", "w");
                if ($file == NULL) {
                    LogMessage("Error: Failed to open Users.csv!");
                } else {
                    fprintf($file, "%s", $output);
                    fclose($file);
                    $successful = true;
                }
            }
        }
    } else {
        // return false;
    }

    return $successful;
}

function LogMessage(string $message) {
    $datetime = date("Y/m/d h:i:sa");
    $file = fopen("activity.log", "a");

    if ($file == NULL) {
        echo "<p>Error: Failed to open Activity.log!  Contact the system administrator!</p>";
    } else {
        fprintf($file, "%s,%s\n", $datetime, $message);
        fclose($file);
    }
}

function deleteUser(string $userId){
    
}

?>