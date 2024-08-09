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
            <td class="tableHead">User Id</td>
            <td class="tableHead">Firstname</td>
            <td class="tableHead">Lastname</td>
            <td class="tableHead">Email</td>
            <td class="tableHead">Login Date</td>
            <td class="tableHead">Edit</td>
            <td class="tableHead">Remove</td>
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

        if (count($chunks) == 5){

                if (($i % 2) == 0){
                    // even rows
                    echo "<tr>";
                    #echo "<td class=tableCellEven>" . $i . "</td>";
                    echo "<td class=tableCellEven><a href='/UMS/UserView.php?userId=" . $chunks[0] . "'>" . $i . "</a></td>";
                    echo "<td class=tableCellEven>" . $chunks[0] . "</td>";
                    echo "<td class=tableCellEven>" . $chunks[1] . "</td>";
                    echo "<td class=tableCellEven>" . $chunks[2] . "</td>";
                    echo "<td class=tableCellEven><a href='mailto:" . $chunks[3] . "'>" . $chunks[3] . "</a></td>";
                    echo "<td class=tableCellEven>" . $chunks[4] . "</td>";
                    echo "<td class=tableCellEven><a href='/UMS/UserModify.php?userId=" . $chunks[0] . "'>Edit</a></td>";
                    echo "<td class=tableCellEven><a href='/UMS/UserDelete.php?userId=" . $chunks[0] . "'>Remove</a></td>";
                    echo "</tr>";
                } else {
                    // odd rows
                    echo "<tr>";
                    #echo "<td class=tableCellOdd>" . $i . "</td>";
                    echo "<td class=tableCellOdd><a href='/UMS/UserView.php?userId=" . $chunks[0] . "'>" . $i . "</a></td>";
                    echo "<td class=tableCellOdd>" . $chunks[0] . "</td>";
                    echo "<td class=tableCellOdd>" . $chunks[1] . "</td>";
                    echo "<td class=tableCellOdd>" . $chunks[2] . "</td>";
                    echo "<td class=tableCellOdd><a href='mailto:" . $chunks[3] . "'>" . $chunks[3] . "</a></td>";
                    echo "<td class=tableCellOdd>" . $chunks[4] . "</td>";
                    echo "<td class=tableCellOdd><a href='/UMS/UserModify.php?userId=" . $chunks[0] . "'>Edit</a></td>";
                    echo "<td class=tableCellOdd><a href='/UMS/UserDelete.php?userId=" . $chunks[0] . "'>Remove</a></td>";
                    echo "</tr>";
                }
            }
        }
    fclose($userFile);
    }
    ?>
    </table>

    <button  style="margin-top:15px" onclick="location.href='UserAdd.html'" >Add Users</button>

</body>
</html>