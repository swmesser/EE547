<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="Users.css">
</head>
<body>
    <?php
        $servername="127.0.0.1";
        $username = "swmesser";
        $password = "ee547Final";
        $dbname = "ee547";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            echo "<p>Error: Please contact your System Admin!</p>";
        } else{

    ?>
        <table class="userTable">
            <tr>
                <td class="tableHead">Index</td>
                <td class="tableHead">User Id</td>
                <td class="tableHead">Firstname</td>
                <td class="tableHead">Lastname</td>
                <td class="tableHead">Email</td>
                <td class="tableHead">Login Date</td>
                <td class="tableHead">Remove</td>
            </tr>
    <?php
        $i = 0;
    
        $sql = "SELECT id, fname, lname, email, lastseen FROM userinfo";
        $result = $conn->query($sql);

        echo $result->num_rows;

        if ($result->num_rows > 0){
            while( $row = $result->fetch_assoc()){
                $i = $i + 1;
                if ( $i % 2 == 0 ){
                    //Even Row
                    echo "<tr>";
                    #echo "<td class=tableCellEven>" . $i . "</td>";
                    echo "<td class=tableCellEven><a href='/UMS/UserView.php?userId=" . $row['id'] . "'>" . $i . "</a></td>";
                    echo "<td class=tableCellEven>" . $row['id'] . "</td>";
                    echo "<td class=tableCellEven>" . $row['fname'] . "</td>";
                    echo "<td class=tableCellEven>" . $row['lname'] . "</td>";
                    echo "<td class=tableCellEven><a href='mailto:" . $row['email'] . "'>" . $row['email'] . "</a></td>";
                    echo "<td class=tableCellEven>" . $row['lastseen'] . "</td>";
                    echo "<td class=tableCellEven><a href='/UMS/UserDelete.php?userId=" . $row['id'] . "'>Remove</a></td>";
                    echo "</tr>";
                } else { 
                    //Odd Row
                    echo "<tr>";
                    #echo "<td class=tableCellEven>" . $i . "</td>";
                    echo "<td class=tableCellOdd><a href='/UMS/UserView.php?userId=" . $row['id'] . "'>" . $i . "</a></td>";
                    echo "<td class=tableCellOdd>" . $row['id'] . "</td>";
                    echo "<td class=tableCellOdd>" . $row['fname'] . "</td>";
                    echo "<td class=tableCellOdd>" . $row['lname'] . "</td>";
                    echo "<td class=tableCellOdd><a href='mailto:" . $row['email'] . "'>" . $row['email'] . "</a></td>";
                    echo "<td class=tableCellOdd>" . $row['lastseen'] . "</td>";
                    echo "<td class=tableCellOdd><a href='/UMS/UserDelete.php?userId=" . $row['id'] . "'>Remove</a></td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    }

        
    ?>

    </table>
</body>
</html>