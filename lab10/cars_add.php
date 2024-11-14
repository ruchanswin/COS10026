<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta name="description"	content="COS10026 Lab 10">
	<meta name="keywords"		content="Swinburne COS10026 Lab10 PHP and MySQL Database Operations">	
	<meta name="author"			content="Minh Nguyen">
	<title>Adding cars to MySQL</title>
</head>
<body>
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
        $query="INSERT INTO $sql_table (make, model, price, yom) VALUES ('$make', '$model', '$price', '$yom')";
        $result=mysqli_query($conn, $query);

        if (!$result) {
            echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
        } else {
            echo "<p class=\"ok\">Sucessfully added New Car record</p>";
        }
        
        mysqli_close($conn);
    }
?>
</body>
</html>