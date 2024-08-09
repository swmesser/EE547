<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['count'])) {
        $value = $_GET['count'];
        $value = $value + 1;
    } else {
        $value = 0;
    }

    echo $value;
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['count'])) {
        $value = $_POST['count'];
        $value = $value + 1;
    } else {
        $value = 0;
    }

    echo $value;
} else {
    // not handled...
    $value = 0;

    echo $value;
}


?>