<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Job Application">
    <meta name="keywords" content="HTML, CSS">
    <meta name="author" content="Minh Nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Job Application Form</title>
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
    <div class="app-container">
      <form method="post" action="processEOI.php" novalidate="novalidate">
        <h1>Interested in joining the company? Let's get started!!</h1>
        <h2>Personal Information</h2>
        <fieldset>
          <legend>Name details</legend>

          <label> First Name* <input type="text" name="FirstName" maxlength="20"
            pattern="^[a-zA-Z]+$"
            required="required"></label>
          <label> Last Name* <input type="text" name="LastName" maxlength="20"
            pattern="^[a-zA-Z]+$"
            required="required"></label>
          Gender*
          <label><input type="radio" name="gender"
            value="male" checked="checked" required="required"> Male</label>
          <label><input type="radio" name="gender" value="female"> Female</label>
          <br>
          <br>
          <label> Date of Birth* <input type="text" name="dob"
            placeholder="dd-mm-yyyy"
            pattern="/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-\d{4}$/"
            required="required"></label>
        </fieldset>
        <br>
        <fieldset>
          <legend>Address</legend>

          <label> Unit Number <input type="text" name="UnitNumber" maxlength="5"
            pattern="^[0-9]+$"
            required="required"></label>
          <label> Street Address* <input type="text" name="StreetAddress" maxlength="40"
            pattern="^[a-zA-Z]+$"
            required="required"></label>
          <label> Suburb/Town* <input type="text" name="Suburb/Town" maxlength="40"
            pattern="^[a-zA-Z]+$"
            required="required"></label>
          <label for="state">State*</label>
          <select name="state" id="state" required="required">
            <option value="Please Select" selected="selected">Please Select</option>
            <option value="VIC">VIC</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="NT">NT</option>
            <option value="WA">WA</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="ACT">ACT</option>
          </select>
          <label> Postcode* <input type="text" name="Postcode" maxlength="4"
            pattern="^[0-9]+$"
            required="required"></label>
        </fieldset>
        <br>
        <fieldset>
          <legend>Contact Details</legend>
          <label>Email* <input type="email" name="contactemail"
            placeholder="name@domain.com"
            required="required"></label>
          <label>Phone* <input type="tel" name="phone"
            placeholder="###########"
            pattern="\(\d{2}\) d{9}{8,12}"
            required="required"></label>
        </fieldset>
        <br>

        <h2>Job Position</h2>
        <fieldset>
          <legend>Position</legend>
          <label>Job Reference Number* <input type="text" name="job" maxlength="5"
            pattern="^[a-zA-Z0-9]+$"
            required="required"></label>
          <label for="pos">Position Applied For</label>
          <select name="position" id="pos" required="required">
            <option value="Please Select" selected="selected">Please Select</option>
            <option value="Cyber Security Specialist">Cyber Security Specialist</option>
            <option value="Business Analyst">Business Analysis</option>
            <option value="IT Consultant">IT Consultant</option>
          </select>
          <label for="yy">Years of experience</label>
          <select name="yy" id="yy" required="required">
            <option value="Please Select" selected="selected">Please Select</option>
            <option value="no">No experience or less than 1 year</option>
            <option value="1-3">1-3 years</option>
            <option value="4-6">4-6 years</option>
            <option value="7-9">7-9 years</option>
            <option value="10+">More than 10 years</option>
          </select>
          <br>
          <label>Preferred Salary <input type="text" name="salary"
            pattern="^[a-zA-Z0-9]+$"
            placeholder="80,000 - 100,000 AUD"
            required="required"></label>
          Skills*<br>
          <label><input type="checkbox" name="skill1" value="communication" checked="checked"> Communicating</label>
          <br>
          <label><input type="checkbox" name="skill2" value="pro"> Proficiency in programming languages (Python, C, JavaScript, etc...)</label><br>
          <label><input type="checkbox" name="skill3" value="problem"> Problem-solving</label><br>
          <label><input type="checkbox" name="skill4" value="system"> Familiar with different operating systems (Windows, Linux, MacOS, etc..)</label><br>
          <label><input type="checkbox" name="skill5" value="think"> Critical thinking</label>
          <br>
          <label><input type="checkbox" name="skill" value="other"> Other skills</label><br><br>
          <label>Other Skills
            <textarea name="otherskills" rows="5" cols="30" placeholder="Relevant to the job you applied for (soft skills, etc...)"></textarea>
          </label>
        </fieldset>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset Form">
      </form>
    </div>
    <?php include 'footer.inc'; ?>
  </body>
</html>
