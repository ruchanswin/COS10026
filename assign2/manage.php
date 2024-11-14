<?php
session_start();
require_once("settings.php");
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

include("header.inc");

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Function to list all EOIs
    function listAllEOIs($conn) {
        $query = "SELECT * FROM eoi";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<h2>List of all EOIs</h2>";
            echo "<table>";
            echo "<tr><th>EOI Number</th><th>Job Reference Number</th><th>First Name</th><th>Last Name</th><th>Street Address</th><th>Suburb/Town</th><th>State</th><th>Postcode</th><th>Email Address</th><th>Phone Number</th><th>Skill 1</th><th>Skill 2</th><th>Skill 3</th><th>Other Skills</th><th>Status</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['EOInumber']}</td>";
                echo "<td>{$row['JobReferenceNumber']}</td>";
                echo "<td>{$row['FirstName']}</td>";
                echo "<td>{$row['LastName']}</td>";
                echo "<td>{$row['StreetAddress']}</td>";
                echo "<td>{$row['SuburbOrTown']}</td>";
                echo "<td>{$row['State']}</td>";
                echo "<td>{$row['Postcode']}</td>";
                echo "<td>{$row['EmailAddress']}</td>";
                echo "<td>{$row['PhoneNumber']}</td>";
                echo "<td>{$row['Skill1']}</td>";
                echo "<td>{$row['Skill2']}</td>";
                echo "<td>{$row['Skill3']}</td>";
                echo "<td>{$row['OtherSkills']}</td>";
                echo "<td>{$row['Status']}</td>";
                echo "</tr>";
            }

            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "Error retrieving EOIs: " . mysqli_error($conn);
        }
    }

    // Function to list EOIs by job reference
    function listEOIsByJobReference($conn, $job_reference) {
        $query = "SELECT * FROM eoi WHERE JobReferenceNumber = '$job_reference'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<h2>EOIs for Job Reference Number: $job_reference</h2>";
            echo "<table>";
            echo "<tr><th>EOI Number</th><th>First Name</th><th>Last Name</th><th>Street Address</th><th>Suburb/Town</th><th>State</th><th>Postcode</th><th>Email Address</th><th>Phone Number</th><th>Skill 1</th><th>Skill 2</th><th>Skill 3</th><th>Other Skills</th><th>Status</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['EOInumber']}</td>";
                echo "<td>{$row['FirstName']}</td>";
                echo "<td>{$row['LastName']}</td>";
                echo "<td>{$row['StreetAddress']}</td>";
                echo "<td>{$row['SuburbOrTown']}</td>";
                echo "<td>{$row['State']}</td>";
                echo "<td>{$row['Postcode']}</td>";
                echo "<td>{$row['EmailAddress']}</td>";
                echo "<td>{$row['PhoneNumber']}</td>";
                echo "<td>{$row['Skill1']}</td>";
                echo "<td>{$row['Skill2']}</td>";
                echo "<td>{$row['Skill3']}</td>";
                echo "<td>{$row['OtherSkills']}</td>";
                echo "<td>{$row['Status']}</td>";
                echo "</tr>";
            }

            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "Error retrieving EOIs for Job Reference Number: $job_reference";
        }
    }

    // Function to list EOIs by applicant
    function listEOIsByApplicant($conn, $first_name, $last_name) {
        $query = "SELECT * FROM eoi WHERE FirstName LIKE '%$first_name%' AND LastName LIKE '%$last_name%'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<h2>EOIs for Applicant: $first_name $last_name</h2>";
            echo "<table>";
            echo "<tr><th>EOI Number</th><th>Job Reference Number</th><th>First Name</th><th>Last Name</th><th>Street Address</th><th>Suburb/Town</th><th>State</th><th>Postcode</th><th>Email Address</th><th>Phone Number</th><th>Skill 1</th><th>Skill 2</th><th>Skill 3</th><th>Other Skills</th><th>Status</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['EOInumber']}</td>";
                echo "<td>{$row['JobReferenceNumber']}</td>";
                echo "<td>{$row['FirstName']}</td>";
                echo "<td>{$row['LastName']}</td>";
                echo "<td>{$row['StreetAddress']}</td>";
                echo "<td>{$row['SuburbOrTown']}</td>";
                echo "<td>{$row['State']}</td>";
                echo "<td>{$row['Postcode']}</td>";
                echo "<td>{$row['EmailAddress']}</td>";
                echo "<td>{$row['PhoneNumber']}</td>";
                echo "<td>{$row['Skill1']}</td>";
                echo "<td>{$row['Skill2']}</td>";
                echo "<td>{$row['Skill3']}</td>";
                echo "<td>{$row['OtherSkills']}</td>";
                echo "<td>{$row['Status']}</td>";
                echo "</tr>";
            }

            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "Error retrieving EOIs for Applicant: $first_name $last_name";
        }
    }

    // Function to delete EOIs by job reference
    function deleteEOIsByJobReference($conn, $job_reference) {
        $deleteQuery = "DELETE FROM eoi WHERE JobReferenceNumber = '$job_reference'";
        $delete = mysqli_query($conn, $deleteQuery);

        if ($delete) {
            echo "Deleted EOIs with Job Reference Number: $job_reference";
        } else {
            echo "Error deleting EOIs for Job Reference Number: $job_reference";
        }
    }

    // Function to change EOI status
    function changeEOIStatus($conn, $eoi_id, $new_status) {
        $updateQuery = "UPDATE eoi SET Status = '$new_status' WHERE EOInumber = $eoi_id";
        $update = mysqli_query($conn, $updateQuery);

        if ($update) {
            echo "Updated EOI Status for ID $eoi_id to $new_status";
        } else {
            echo "Error updating EOI Status for ID $eoi_id";
        }
    }

    if ($action === 'list_all_eois') {
        listAllEOIs($conn);
    } elseif ($action === 'list_by_position' && isset($_POST['job_reference'])) {
        $job_reference = $_POST['job_reference'];
        listEOIsByJobReference($conn, $job_reference);
    } elseif ($action === 'list_by_applicant' && isset($_POST['first_name']) && isset($_POST['last_name'])) {
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        listEOIsByApplicant($conn, $first_name, $last_name);
    } elseif ($action === 'delete_by_job_reference' && isset($_POST['job_reference'])) {
        $job_reference = $_POST['job_reference'];
        deleteEOIsByJobReference($conn, $job_reference);
    } elseif ($action === 'change_status' && isset($_POST['eoi_id']) && isset($_POST['new_status'])) {
        $eoi_id = $_POST['eoi_id'];
        $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
        changeEOIStatus($conn, $eoi_id, $new_status);
    }
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="public/images/logo.png">
    <meta charset="UTF-8">
    <meta name="author" content="Shane Lin">
    <meta name="keyword" content="manager">
    <meta name="description" content="Assignment 2">
    <link href="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>HR Manager Queries</title>
</head>
<body id="manage">
<main>
    <div class="intromn">
        <h1>HR Manager Queries</h1>
    </div>
    <div class="main_form">
        <form action="manage.php" method="post" novalidate>
            <label for="action">Select Action:</label>
            <select name="action" id="action">
                <option value="list_all_eois">List All EOIs</option>
                <option value="list_by_position">List EOIs by Job Reference Number</option>
                <option value="list_by_applicant">List EOIs by Applicant</option>
                <option value="delete_by_job_reference">Delete EOIs by Job Reference Number</option>
                <option value="change_status">Change EOI Status</option>
            </select>
            <div id="jobReferenceInput" style="display: none;">
                <label for="job_reference">Job Reference Number:</label>
                <input type="text" id="job_reference" name="job_reference">
            </div>
            <div id="applicantInput" style="display: none;">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name">
            </div>
            <div id="statusInput" style="display: none;">
                <label for="eoi_id">EOI ID:</label>
                <input type="text" id="eoi_id" name="eoi_id">
                <label for="new_status">New Status:</label>
                <select id="new_status" name="new_status">
                    <option value="New">New</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Declined">Declined</option>
                </select>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
    <script>
        document.getElementById("action").addEventListener("change", function () {
            const selectedAction = this.value;
            document.getElementById("jobReferenceInput").style.display = "none";
            document.getElementById("applicantInput").style.display = "none";
            document.getElementById("statusInput").style.display = "none";
            if (selectedAction === "list_by_position") {
                document.getElementById("jobReferenceInput").style.display = "block";
            } else if (selectedAction === "list_by_applicant") {
                document.getElementById("applicantInput").style.display = "block";
            } else if (selectedAction === "delete_by_job_reference") {
                document.getElementById("jobReferenceInput").style.display = "block";
            } else if (selectedAction === "change_status") {
                document.getElementById("jobReferenceInput").style.display = "block";
                document.getElementById("statusInput").style.display = "block";
            }
        });
    </script>
</main>
<?php
include("footer.inc");
?>
</body>
</html>
