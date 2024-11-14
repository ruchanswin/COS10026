<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="public/images/logo/png/logo.png">
        <meta charset="utf-8">
        <meta name="author" content="Group 6">
        <meta name="keyword" content="html css">
        <meta name="description" content="Assignment-1 enhancements page">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"   href="styles/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <title>Enhancements</title>
        <style>
            .section {
              display: none;
            }
            :target {
              display: block;
            }
          </style>
            </head>
        <body style="font-family: Roboto">
          <?php include 'header.inc'; ?>
        <br><br>
        <div class="enhancements_info">
        <h1>Implementation of enhancements (Part 2)</h1>
        <p>Fourth, we implemented a login page.</p>
        <p>By successfully logging in as an admin with the correct information (username and password), you can then access the manage page of the website. </p>
        <p>When attempting to enter the manage page the user will be presented with the login, error messages for having no details as well as incorrect details are coded. When closing the browser the user is logged out and must log back in otherwise the user does not need to re-authenticate themselves.</p>
        <p>Here is the photo and the link to the place where I implemented the enhancement</p>
        <img src="images/login_code.jpg" alt="login_code" width="300">
        <p><a href="login.php">Login Page</a></p>
        <p>Fifth, we store the job description in SQL and print it with PHP</p>
        <p>This will save a lot of to print out job description since we just need to update information in the database and the job description will be automatically updated.</p>
        <p>Also, this will remain the integrity of the webpages since we don't need to change the HTML content, which sometimes causes minor errors if not careful.</p>
        <p>Here is the photo and the link to the place where I implemented the enhancement</p>
        <img src="images/jobs.png" alt="login_code" width="300">
        <p><a href="jobs.php">Job Description Page</a></p>
        </div>
    
    <?php include 'footer.inc'; ?>
      </body>
      </html>