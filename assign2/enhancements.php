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
        <h1>Implementation of enhancements</h1>
        <br>
        <p>Beyond the basic requirements, we have implemented the following enhancements:</p>
        <p>First, we add a transition to the navigation bar. When the mouse hovers over the navigation bar, a transition effect will be applied to the navigation bar.</p>
        <p>The transition effect is that a white line under the navigation bar will run from left to right, indicating where the mouse hovers over.</p>
        <p>The transition effect is implemented by adding a transition property to the navbar class in the style.css file.</p>
        <p>The transition property specifies the transition effect; the transition duration is 0.4 seconds.</p>
        <p>This transition applies to our whole website.</p>
        <img src="images/underline_transition.png" alt="underline_transition" width="300">
        <p>This is our reference to make that underline-hover effect:</p>
        <a href="https://www.w3schools.com/css/css3_transitions.asp" class="ref">Underline-Hover</a><br><br>
        <p>Second, we add an effect when you hover over the submit and reset buttons on the apply and jobs pages. </p>
        <p>When the mouse hovers over the submit, reset, and 'apply now' buttons, the button will change to a darker color.</p>
        <p>The effect is implemented by adding a hover property to the buttons in the style.css file.</p>
        <img src="images/button_hover.png" alt="button_hover" width="300">
        <img src="images/button_hover1.png" alt="button_hover1" width="300">
        <p>This is our reference for making that button-hover effect:</p>
        <a href="https://www.w3schools.com/csS/css3_buttons.asp" class="ref">Button-Hover</a><br>
        <p>Third, we add a media query to the website.</p>
        <p>When the screen size is smaller than 1024 px, the navigation bar will be aligned to the center, and the margin will be changed.</p>
        <p>The media query is implemented by adding a media query property to the navbar class in the style.css file.</p>
        <img src="images/media_query.png" alt="media_query" width="300">
        <p>This is our reference to make that media-query effect:</p>
        <a href="https://www.w3schools.com/css/css3_mediaqueries.asp" class="ref">Media-Query</a><br><br>
    </div>
    
    <?php include 'footer.inc'; ?>
      </body>
      </html>