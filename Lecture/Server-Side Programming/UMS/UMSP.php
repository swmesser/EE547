<?php

$servername = "127.0.0.1";
$username = "swmesser";
$password = "ee547Final";
$dbname = "ee547";

class User
{
    public $userid;
    public $fname;
    public $lname;
    public $email;
    public $datetime;

    public function isValid()
    {
        return true;
    }

    public function toCSV()
    {
        $csv = $this->userid . "," . $this->fname . "," . $this->lname . "," . $this->email . "," . $this->datetime;
        return $csv;
    }

    public function toHTML()
    {
        return "";
    }
}

class Message {

    public function toHTMLShort()
    {
        return "";
    }
    public function toHTML()
    {
        return "";
    }    
}

function AddUserWithAll(string $userid, string $fname, string $lname, string $email, string $datetime) {

}

function AddUser(User $user) {

}

function UpdateUser(User $user) {

}

function IsUser(string $userid) {
    global $servername, $username, $password, $dbname;    
    $exists = false;
    $conn = new mysqli($servername, $username, $password, $dbname);
    //TODO: need to validate

    if ($conn->connect_error) {
        LogMessage($conn->connect_error);
    } else {
        $query = "SELECT * FROM userino WHERE id ='" . $userid . "';";
        $result = $conn->query($query);
        
        if ($result->num_rows == 0) {
            $exists = false;    
        } else if ($result->num_rows > 1) {
            LogMessage("Error: More than one row was returned!");
        } else if ($result->num_rows == 1){
            $exists = true;
        } else {
           LogMessage("Error: Negative row count returned!");
        }
    
        $conn->close();
    }
    return $exists;
}
function GetUser(string $userid) {
    
}

function AddMessage(string $sender,string $recipient, string $message) {
    
}

function GetMessage(int $messageid) {
    
}

function SetMessageRead(int $messageid) {
    
}

function GetFeed(string $userid)
{

}



function LogMessage(string $message) {
    $datetime = date("Y/m/d h:i:sa");
    $file = fopen("Activity.log", "a");

    if ($file == NULL) {
        echo "<p>Error: Failed to open Activity.log!  Contact the system administrator!</p>";
    } else {
        fprintf($file, "%s,%s\n", $datetime, $message);
        fclose($file);
    }
}

?>