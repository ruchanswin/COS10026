<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Creating Web Applications Lab 10">
    <meta name="keywords" content="PHP, MySql">
    <title>Retrieving records to HTML</title>
</head>
<body>
    <h1>Creating Web Applications - Lab10</h1>

<?php
    require_once("settings.php");
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
        $sql_table="cars";
        $query="SELECT make, model, price FROM cars ORDER BY make, model";
        $result=mysqli_query($conn, $query);

        if (!$result) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
            echo "<table border=\'1\'>\n";
            echo "<tr>\n<th>Make</th>\n<th>Model</th>\n<th>Price</th>\n</tr>\n";
            while ($row=mysqli_fetch_assoc($result)) {
                echo "<tr>\n";
                echo "<td>", $row["make"], "</td>\n";
                echo "<td>", $row["model"], "</td>\n";
                echo "<td>", $row["price"], "</td>\n";
                echo "</tr>";
            }
            echo "</table>\n";
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }
?>
</body>
</html>