<html>

<body>
    <h1>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $fname = $_POST['fname3'];
            $lname = $_POST['lname3'];

            echo 'Hello '. $fname .' '. $lname .' (POST)';

        } else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            //echo 'Hello World!';
            $fname = $_GET['fname1'];
            $lname = $_GET['lname1'];

            echo 'Hello ' . $fname .' '. $lname .' (GET)';
        } else {
            echo 'Unhandled request method';
        }
        
        ?>
    </h1>
</body>

</html>