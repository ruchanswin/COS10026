<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="public/images/logo/png/logo.png">
    <meta charset="utf-8">
    <meta name="description" content="Job Description">
    <meta name="keywords" content="HTML">
    <meta name="author" content="Shane Lin">
    <link rel="stylesheet"   href="styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Job Descriptions</title>
</head>

<body>
    <?php include 'header.inc'; ?>

    <section class="banner_jobs">
        <div class="banner-container"><br><br><br><br><br>
            <h1>Job Openings</h1>
            <p>
                At Airnet Gateways, we hold a culture of creativity and excellence. If you want to be part of a passionate team that values your skills and ideas, Join Us Now!
            </p>
        </div>
    </section>

    <div class="job-container">
        <?php
        $createQuery = "CREATE TABLE IF NOT EXISTS job_descriptions (
            job_title INT(5) NULL,
            job_reference_number VARCHAR(10) UNIQUE PRIMARY KEY,
            job_description TEXT,
            qualification TEXT,
            salary_range VARCHAR(50),
        )";
        
        require_once("settings.php"); // Include your connection info
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch job descriptions from the database
        $sql = "SELECT * FROM job_descriptions";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Inside the loop that fetches job descriptions
echo '<section class="job-section">';
echo '<h2>' . $row["job_title"] . ' ' . '#' .$row["job_reference_number"] . '</h2>';
echo '<p>' . nl2br($row["job_description"]) . '</p>';
echo '<p class="qualification"><strong>Qualification:</strong></p>';
echo '<ul>';
// Split qualifications into an array using a delimiter (e.g., newline or comma)
$qualifications = explode("\n", $row["qualification"]); // Change the delimiter if needed
foreach ($qualifications as $qualification) {
    echo '<li>' . $qualification . '</li>';
}
echo '</ul>';
echo '<p class="salary">Salary Range: ' . $row["salary_range"] . '</p>';
echo '<div class="button">';
echo '<a href="apply.php?job_id=' . '" class="apply-button">Apply Now</a>';
echo '</div>';
echo '</section>';
            }
        } else {
            echo "No job descriptions available.";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

    <section class="faq-container">
        <h3> Frequently Asked Questions</h3>
        <div class="faq">
            <input type="checkbox" class="faq-toggle" id="faq1">
            <label class="faq-question" for="faq1">1. What if I don't meet the required qualifications?</label>
            <p class="faq-answer">Applicants who do not meet the required qualifications will not be considered. However, your application may still be assessed if you have previous experience in the field without a degree.</p>
        </div>
        <div class="faq">
            <input type="checkbox" class="faq-toggle" id="faq2">
            <label class="faq-question" for="faq2">2. When will I receive my application outcome?</label>
            <p class="faq-answer">Applications typically take about two weeks to process. If your application is successful, you will be notified via email.</p>
        </div>
        <div class="faq">
            <input type="checkbox" class="faq-toggle" id="faq3">
            <label class="faq-question" for="faq3">3. Can I apply for multiple job positions?</label>
            <p class="faq-answer"> You can apply for multiple positions. Please submit separate applications for each position.</p>
        </div>
    </section>

    <?php include 'footer.inc'; ?>
</body>
</html>
