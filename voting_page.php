<?php
  session_start();
  if(!isset($_SESSION["enrollment"])){
    echo"Session Ended<br> This page is not accessible to you";
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Custom Radio Buttons With Cool Effect | Pure CSS</title>
    <!-- Google Fonts Link -->
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!-- stylesheet -->
    <link rel="stylesheet" href="css/voting_page.css" />
  </head>
  <body>
    <div class="wrapper">
      <h2>Drop Your Vote</h2>
      <form name="vote" method="post">
      <div class="radio-buttons">
          <label class="custom-radio">
            <input type="radio" name="vote" value="boy1" checked />
            <div class="radio-btn">
              <div class="content">
                <div class="profile-img">
                  <img src="images/boy 1.jpg" />
                </div>
                <h2>Boy 1</h2>
                <span class="skill">1st party</span>
                <span class="check-icon">
                  <span class="icon"></span>
                </span>
              </div>
            </div>
          </label>
          <label class="custom-radio">
            <input type="radio" name="vote" value="girl1" />
            <div class="radio-btn">
              <div class="content">
                <div class="profile-img">
                  <img src="images/girl 1.jpg" />
                </div>
                <h2>Girl 1</h2>
                <span class="skill">Party 2</span>
                <span class="check-icon">
                  <span class="icon"></span>
                </span>
              </div>
            </div>
          </label>
          <label class="custom-radio">
            <input type="radio" name="vote" value="girl2"/>
            <div class="radio-btn">
              <div class="content">
                <div class="profile-img">
                  <img src="images/girl 2.jpg" />
                </div>
                <h2>Girl 2</h2>
                <span class="skill">Party 3</span>
                <span class="check-icon">
                  <span class="icon"></span>
                </span>
              </div>
            </div>
          </label>
          <label class="custom-radio">
            <input type="radio" name="vote" value="boy2"/>
            <div class="radio-btn">
              <div class="content">
                <div class="profile-img">
                  <img src="images/boy 2.jpg" />
                </div>
                <h2>Boy 2</h2>
                <span class="skill">Party 4</span>
                <span class="check-icon">
                  <span class="icon"></span>
                </span>
              </div>
            </div>
          </label>
        </div>
        <div class="submit">
          <input type="submit" class="button" value="Submit" name="submit">
          <input type="reset" class="button" id="cancel" value="Cancel">
        </div>
      </form>
    </div>
  </body>
</html>


<?php
    // error_reporting(1);
    include("database.php");

    if(isset($_POST["submit"])){
        $enrollment=$_SESSION["enrollment"];
        $name=$_SESSION["name"];
        $gender=$_SESSION["gender"];
        $department=$_SESSION["department"];
        $year=$_SESSION["year"];
        $shift=$_SESSION["shift"];
        $section=$_SESSION["section"];
        $vote=$_POST["vote"];
        if(isset($conn)){
            try{
                $insertion="INSERT INTO user_info (enrollment_no, name, gender, department, year, shift, section, vote) values ('$enrollment','$name','$gender','$department','$year','$shift','$section', '$vote')";
                $insert = mysqli_query($conn,$insertion);
                if(isset($insert)){
                  session_unset();
                  session_destroy();
                  echo "<font color='white'>Thank you for Voting.<br> Your precious vote is registered successfully.<br>";
                  header("Location: submitted.php");
                }
            }
            catch(mysqli_sql_exception){
                echo"<font color='white'>You have already voted.<br>";
            }
        }
    }
?>