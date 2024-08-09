<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserAddImage</title>
</head>
<body>
    <?php 
    $target_dir = "images/";
    $userId = $_POST['userId'];

    
    $target_file = $target_dir . $userId . "JPEG";

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES['userImage']['tmp_name']);
        if ( $check !== false ){
            echo "File is an image - " . $check['mime'] . ".";

            if ($imageFileType == 'jpeg'){
                if (move_uploaded_file($_FILES['userImage']['tmp_name'], $target_file)){
                    echo "The file " . htmlspecialchars( basename ( $_FILES['userImage']['name'])) . " has been uploaded!";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Only JPEG files are allowed!";
            }
        } else {
            echo "<p>Error: Filecheck Failed!</p>";
        }
    } else {
        echo "<p>Error: Upload Failed!</p>";
    }

    ?>
</body>
</html>