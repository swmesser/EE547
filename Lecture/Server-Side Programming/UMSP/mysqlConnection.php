<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Connect</title>
</head>
<body>
    <?php 
    $servername = "127.0.0.1";
    $username = "swmesser";
    $password = "ee547Final";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    } else {
        echo "Connection Successful!";
    }
    ?>
</body>
</html>