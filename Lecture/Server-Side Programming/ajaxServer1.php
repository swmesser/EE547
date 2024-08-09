<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AjaxServer</title>
</head>
<body>
    <?php
        $value = $_GET['count'];

        $value = $value + 1;

        echo $value;
    ?>
</body>
</html>