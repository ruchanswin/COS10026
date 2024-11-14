<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="PHP">
    <meta name="keywords" content="HTML5, PHP">
    <meta name="author" content="Minh Nguyen">
    <title>Booking Confirmation</title>
</head>
<body>
<h1>Rohirrim Tour Booking Confirmation</h1>
<?php
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $firstname = isset($_POST["firstname"]) ? sanitise_input($_POST["firstname"]) : "";
    $lastname = isset($_POST["lastname"]) ? sanitise_input($_POST["lastname"]) : "";
    $species = isset($_POST["species"]) ? sanitise_input($_POST["species"]) : "";
    $age = isset($_POST["age"]) ? sanitise_input($_POST["age"]) : "";
    $food = isset($_POST["food"]) ? sanitise_input($_POST["food"]) : "";
    $partySize = isset($_POST["partySize"]) ? sanitise_input($_POST["partySize"]) : "";
    $tour = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (empty($firstname)) {
            echo "<p>You must enter your first name.</p>";
        } elseif (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
            echo "<p>Only letters are allowed in your first name.</p>";
        }

        if (empty($lastname)) {
            echo "<p>You must enter your last name.</p>";
        } elseif (!preg_match("/^[a-zA-Z-]*$/", $lastname)) {
            echo "<p>Only letters or a hyphen are allowed in your last name.</p>";
        }

        if (empty($species)) {
            echo "<p>You must enter your species.</p>";
        }

        if (empty($age)) {
            echo "<p>You must enter your age.</p>";
        } elseif (!is_numeric($age) || floatval($age) != intval($age) || $age <= 0) {
            echo "<p>Your age must be a natural number.</p>";
        } elseif ($age < 10 || $age > 200) {
            echo "<p>Your age must be between 10 and 200.</p>";
        }

        if (empty($partySize)) {
            echo "<p>You must enter the number of travelers.</p>";
        } elseif (!is_numeric($partySize) || floatval($partySize) != intval($partySize) || $partySize <= 0) {
            echo "<p>The number of travelers must be a natural number.</p>";
        }

        if (empty($food) || $food == "Please select") {
            echo "<p>You must select a menu preference.</p>";
        }

        if (!isset($_POST["tour"])) {
            echo "<p>You must select a tour option.</p>";
        } else {
            $selectedTours = $_POST["tour"];
            $numTours = count($selectedTours);
            
            foreach ($selectedTours as $key => $selectedTour) {
                if ($selectedTour === "1day") {
                    $tour .= "1-day tour";
                } elseif ($selectedTour === "4day") {
                    $tour .= "4-day tour";
                } elseif ($selectedTour === "10day") {
                    $tour .= "10-day tour";
                }

                if ($numTours > 1 && $key === ($numTours - 2)) {
                    $tour .= " and ";
                } elseif ($key !== ($numTours - 1)) {
                    $tour .= ", ";
                }
            }
        }        
    }

    if (empty($firstname) || empty($lastname) || empty($species) || empty($age) || empty($partySize) || empty($food) || $food == "Please select" || empty($tour)) {
        echo "<p>Booking information is incomplete. Please go back and fill in all required fields.</p>";
    } else {
        echo "<p>Welcome $firstname $lastname!<br>
        You are now booked on the $tour.<br> 
        Species: $species<br>
        Age: $age<br>
        Meal Preference: $food<br>
        Number of travelers: $partySize</p>";
    }
?>
</body>
</html>
