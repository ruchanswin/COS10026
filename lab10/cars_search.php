<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta name="description"	content="COS10026 Lab 10">
	<meta name="keywords"		content="Lab10 PHP and MySQL Database Operations">	
	<meta name="author"			content="Minh Nguyen">
	<title>Search result</title>
</head>
<body>
	<h1>Search a Car</h1>
	<?php
htmlspecialchars($_POST["make"]);
htmlspecialchars($_POST["model"]);
htmlspecialchars($_POST["price"]);
htmlspecialchars($_POST["yom"]);

    $make = trim($_POST["make"]);
    $model = trim($_POST["model"]);
    $price = trim($_POST["price"]);
    $yom = trim($_POST["yom"]);

    require_once("settings.php");
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
        $sql_table="cars";
        $query="SELECT * FROM $sql_table WHERE make LIKE'%$make%' AND model LIKE'%$model%' AND price LIKE'%$price%' AND yom LIKE'%$yom%'";
        $result = mysqli_query($conn, $query);

        if ( mysqli_num_rows($result) > 0) {
                echo "<table border=\'1\'>\n";
                echo "<tr>\n<th>Make</th>\n<th>Model</th>\n<th>Price</th>\n<th>Year of Manufacture</th>\n</tr>\n";
                while ($row=mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
                    echo "<td>", $row["make"], "</td>\n";
                    echo "<td>", $row["model"], "</td>\n";
                    echo "<td>", $row["price"], "</td>\n";
                    echo "<td>", $row["yom"], "</td>\n";
                    echo "</tr>";
                }
                echo "</table>\n";
            } else {
            echo "<p>No cars found.</p>";
        }
        mysqli_close($conn);
    }
?>
</body>
</html>