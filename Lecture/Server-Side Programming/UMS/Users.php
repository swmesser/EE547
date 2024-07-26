<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users.php</title>
    <link rel="stylesheet" href="Users.css">
</head>
<body>
    <table class="userTable">
        <tr>
            <td class="tableHead">Index</td>
            <td class="tableHead">Firstname</td>
            <td class="tableHead">Lastname</td>
            <td class="tableHead">Email</td>
            <td class="tableHead">Login Date</td>
        </tr>
    

    <?php 
    $userFile = fopen("users.csv", "r");
    if ($userFile == NULL){
        echo "Error: Failed to open file!";
    } else{


        $i = 0;
        while(!feof($userFile)){
            $line = fgets($userFile);
            $i = $i + 1;

            $chunks = str_getcsv($line);

        if (count($chunks) == 4){

                if (($i % 2) == 0){
                    // even rows
                    echo "<tr>";
                    #echo "<td class=tableCellEven>" . $i . "</td>";
                    echo "<td class=tableCellEven><a href='/UMS/UserView.php?email=" . $chunks[2] . "'>" . $i . "</a></td>";
                    echo "<td class=tableCellEven>" . $chunks[0] . "</td>";
                    echo "<td class=tableCellEven>" . $chunks[1] . "</td>";
                    echo "<td class=tableCellEven><a href='mailto:" . $chunks[2] . "'>" . $chunks[2] . "</a></td>";
                    echo "<td class=tableCellEven>" . $chunks[3] . "</td>";
                    echo "</tr>";
                } else {
                    // odd rows
                    echo "<tr>";
                    #echo "<td class=tableCellOdd>" . $i . "</td>";
                    echo "<td class=tableCellOdd><a href='/UMS/UserView.php?email=" . $chunks[2] . "'>" . $i . "</a></td>";
                    echo "<td class=tableCellOdd>" . $chunks[0] . "</td>";
                    echo "<td class=tableCellOdd>" . $chunks[1] . "</td>";
                    echo "<td class=tableCellOdd><a href='mailto:" . $chunks[2] . "'>" . $chunks[2] . "</a></td>";
                    echo "<td class=tableCellOdd>" . $chunks[3] . "</td>";
                    echo "</tr>";
                }
            }
        }
    fclose($userFile);
    }
    ?>
    </table>
</body>
</html>