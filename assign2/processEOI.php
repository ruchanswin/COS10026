<?php
// Retrieve and sanitize form data
function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$FirstName = isset($_POST["FirstName"]) ? sanitise_input($_POST["FirstName"]) : "";
$LastName = isset($_POST["LastName"]) ? sanitise_input($_POST["LastName"]) : "";
$gender = isset($_POST["gender"]) ? sanitise_input($_POST["gender"]) : "";
$dob = isset($_POST["dob"]) ? sanitise_input($_POST["dob"]) : "";
$unit = isset($_POST["UnitNumber"]) ? sanitise_input($_POST["UnitNumber"]) : "";
$streetAddress = isset($_POST["StreetAddress"]) ? sanitise_input($_POST["StreetAddress"]) : "";
$city = isset($_POST["Suburb/Town"]) ? sanitise_input($_POST["Suburb/Town"]) : "";
$state = isset($_POST["state"]) ? sanitise_input($_POST["state"]) : "";
$postcode = isset($_POST["Postcode"]) ? sanitise_input($_POST["Postcode"]) : "";
$phone = isset($_POST["phone"]) ? sanitise_input($_POST["phone"]) : "";
$email = isset($_POST["contactemail"]) ? sanitise_input($_POST["contactemail"]) : "";
$ref = isset($_POST["job"]) ? sanitise_input($_POST["job"]) : "";
$position = isset($_POST["position"]) ? sanitise_input($_POST["position"]) : "";
$year = isset($_POST["yy"]) ? sanitise_input($_POST["yy"]) : "";
$salary = isset($_POST["salary"]) ? sanitise_input($_POST["salary"]) : "";
$skill1 = isset($_POST["skill1"]) ? sanitise_input($_POST["skill1"]) : "";
$skill2 = isset($_POST["skill2"]) ? sanitise_input($_POST["skill2"]) : "";
$skill3 = isset($_POST["skill3"]) ? sanitise_input($_POST["skill3"]) : "";
$skill4 = isset($_POST["skill4"]) ? sanitise_input($_POST["skill4"]) : "";
$skill5 = isset($_POST["skill5"]) ? sanitise_input($_POST["skill5"]) : "";
$skill = isset($_POST["skill"]) ? sanitise_input($_POST["skill"]) : "";
$otherSkills = isset($_POST["otherskills"]) ? sanitise_input($_POST["otherskills"]) : "";

// Server-side validation
$isValid = true;
$errorMessages = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
// Validate Job Reference Number
    if (empty($ref)) {
    $isValid = false;
    echo "<p>You must enter your job reference number.</p>";
}
elseif (!preg_match('/^[A-Za-z0-9]{5}$/', $ref)) {
    $isValid = false;
    echo "<p>Your job reference number is invalid. It should be a maximum of 5 alphabetic characters.</p>";
}

// Validate First Name
if (empty($FirstName)) {
    $isValid = false;
    echo "<p>You must enter your first name.</p>";
}
elseif (strlen($FirstName) > 20 || !preg_match('/^[A-Za-z ]+$/', $FirstName)) {
    $isValid = false;
    echo "<p>Your first name is invalid. It should be a maximum of 5 alphabetic characters.</p>";
}

// Validate Last Name
if (empty($LastName)) {
    $isValid = false;
    echo "<p>You must enter your last name.</p>";
}
elseif (strlen($LastName) > 20 || !preg_match('/^[A-Za-z ]+$/', $LastName)) {
    $isValid = false;
    echo "<p>Your last name is invalid. It should be a maximum of 5 alphabetic characters.</p>";
}

// Validate Date of Birth
if (empty($dob)) {
    $isValid = false;
    echo "<p>You must enter your date of birth.</p>";
}
elseif (!preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-\d{4}$/', $dob)) {
    $isValid = false;
    echo "<p>Your date of birth is invalid. It should be in dd-mm-yyyy format.</p>";
}

// Validate Street Address
if (empty($streetAddress)) {
    $isValid = false;
    echo "<p>You must enter your street address.</p>";
}
elseif (strlen($streetAddress) > 40) {
    $isValid = false;
    echo "<p>Your street address is invalid. It should be a maximum of 40 characters.</p>";
}

// Validate City
if (empty($city)) {
    $isValid = false;
    echo "<p>You must enter your suburb or your town.</p>";
}
elseif (strlen($city) > 40) {
    $isValid = false;
    echo "<p>Your input is invalid. It should be a maximum of 40 characters.</p>";
}

// Validate State
if (empty($state) || $state == "Please Select") {
    echo "<p>You must select a menu preference.</p>";
}

// Validate Postcode
if (empty($postcode)) {
    $isValid = false;
    echo "<p>You must enter your postcode.</p>";
}
elseif (!preg_match('/^\d{4}$/', $postcode)) {
    $isValid = false;
    echo "<p>Your postcode is invalid. It should be exactly 4 digits.</p>";
}

// Validate Email Address
if (empty($email)) {
    $isValid = false;
    echo "<p>You must enter your email address.</p>";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $isValid = false;
    echo "<p>Your email address is invalid.</p>";
}

// Validate Phone Number
$phone = preg_replace('/\s+/', '', $phone); // Remove spaces
if (empty($phone)) {
    $isValid = false;
    echo "<p>You must enter your phone number.</p>";
}
elseif (!preg_match('/^\d{8,12}$/', $phone)) {
    $isValid = false;
    echo "<p>Invalid Phone Number. It should be 8 to 12 digits or spaces.</p>";
}

// Validate otherSkills if checkbox is selected
if (isset($_POST['skill']) && empty($otherSkills)) {
    $isValid = false;
    echo "<p>Other Skills cannot be empty when the checkbox is selected.</p>";
}

if (empty($FirstName) || empty($LastName) || empty($gender) || empty($dob) || empty($streetAddress) || empty($city) || empty($state) || empty($postcode) || empty($email) || empty($phone) || empty($ref) || empty($position)) {
    echo "<p>Your application form is incomplete. Please go back and fill in all required fields.</p>";
} 

$conn = null;
if ($isValid) {
    // All data is valid; proceed to insert it into the database.
    // ...

    // Create the EOI table if it doesn't exist (only for the first submission)
    $createQuery = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNumber CHAR(5),
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    Gender ENUM('Male', 'Female'),
    DateOfBirth VARCHAR(10),
    UnitNumber VARCHAR(4),
    StreetAddress VARCHAR(40),
    SuburbOrTown VARCHAR(40),
    State ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'),
    Postcode CHAR(4),
    EmailAddress VARCHAR(200),
    PhoneNumber VARCHAR(12),
    Skill1 VARCHAR(100),
    Skill2 VARCHAR(100),
    Skill3 VARCHAR(100),
    Skill4 VARCHAR(100),
    Skill5 VARCHAR(100),
    OtherSkills TEXT,
    Status ENUM('New', 'Current', 'Final') DEFAULT 'New'
    )";

    require_once("settings.php"); // Include your connection info

    // Establish a database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// Terminate the script upon connection failure
if (!$conn) {
    echo "Database connection failure";
} else {
    // Execute the query to create the table
    if (mysqli_query($conn, $createQuery)) {
        // Table created successfully or already exists, continue to insert data.

        // Prepare an SQL query to insert the data into the eoi table
        $insertQuery = "INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, Gender, DateOfBirth, UnitNumber, StreetAddress, SuburbOrTown, State, Postcode, EmailAddress, PhoneNumber, Skill1, Skill2, Skill3, Skill4, Skill5, OtherSkills) VALUES ('$ref', '$FirstName', '$LastName', '$gender', '$dob', '$unit', '$streetAddress', '$city', '$state', '$postcode', '$email', '$phone', '$skill1', '$skill2', '$skill3', '$skill4', '$skill5', '$otherSkills')";

        // Execute the insert query
        if (mysqli_query($conn, $insertQuery)) {
            // Data inserted successfully
            $lastInsertedId = mysqli_insert_id($conn); // Get the auto-generated EOInumber
            echo "Thank you for your application! Your EOInumber is $lastInsertedId.";
        } else {
            // Error inserting data
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Error creating the table
        echo "Error: " . mysqli_error($conn);
    }
    
    // Close the database connection
    mysqli_close($conn);
}
}
}
?>