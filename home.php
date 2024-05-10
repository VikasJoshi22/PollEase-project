<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'">vote With Google</a>';
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PollEase</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' rel='stylesheet'> 
    <link rel="stylesheet" href="css/home.css" />
  </head>
  <body>
    <nav>
      <img class="logo" src="images/PollEase.png" alt="" />
      <ul class="nav__links">
        <li class="nav__item">
          <a href="#">Home</a>
        </li>
        <li class="nav__item">
          <a href="#about-section">About Us</a>
        </li>
        <li class="nav__item">
          <a href="#contact-section">Contact Us</a>
        </li>
      </ul>
      <div class="container">
      <?php
      
   if($login_button == '')
   {
    echo '
        <a href="user_info.php" class="cta"><button>Vote Now</button></a>
        <a href="logout.php" class="cta"><button class="log">Logout</button></a>';
   }
   else
   {
    echo '
    <a href="'.$google_client->createAuthUrl().'" class="cta"><button>Vote Now</button></a>
    <a href="'.$google_client->createAuthUrl().'" class="cta"><button class="log">Login</button></a>';
   }
   ?>
   </div>

</nav>
      
    <section class="slideshow-header">
      <div class="header-container">
        <h2>Poll Ease</h2>
        <p>Your Vote, Your Choice, Our Platform</p>
      </div>
    </section>
    <section id="hero-section">
      <div class="overlay"></div>
      <div class="slideshow-container">
        <!-- Slideshow images and controls -->
        <div class="mySlides fade">
          <img src="images/3EE47F7537F01FC4-1-1024x682.jpeg" style="width: 100%" />
        </div>
        <!-- Next and previous buttons -->
        <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
      </div>
    </section>

    <section id="about-section">
      <div class="about-container">
        <div class="content">
          <h3>About Project</h3>
          <p>
            Our website, developed as a part of a web-based programming project using PHP, 
            offers a comprehensive solution for conducting college elections online.  
            Through meticulous design and implementation, we've created a platform that ensures 
            the integrity and efficiency of the voting process while providing a seamless experience 
            for students.
          </p>
          <p>
            At the core of our project is a robust and secure voting system, 
            designed to safeguard the confidentiality and accuracy of each vote cast. 
            By implementing stringent authentication measures, we ensure that only eligible students 
            can participate in the election, maintaining the integrity of the democratic process.
          </p>
          <p>
            By empowering students to engage in the democratic process conveniently and securely, 
            our project contributes to fostering a culture of participation and civic engagement 
            within the college community.
          </p>
          <a href="/about" class="view-more">View More →</a>
        </div>
        <div class="image-container">
          <img
            src="images/msi.png"
            alt="Video about myScheme"
          />
        </div>
      </div>
    </section>

    <section id="team-section">
      <div class="title-text">
        <h1>Meet the Team</h1>
        <p class="subheading">Learn about their roles and contributions.</p>
      </div>
      <div class="team-row">
        <div class="column">
          <div class="team-member">
            <div class="team-container">
              <h2>Vikas Joshi</h2>
              <p class="title">Everything</p>
              <p>Course - BCA</p>
              <p>inquery.vikas@gmail.com</p>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="team-member">
            <div class="team-container">
              <h2>Gautam Karki</h2>
              <p class="title">Nothing</p>
              <p>Course - BCA</p>
              <p>inquery.Gautam@gmail.com</p>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="team-member">
            <div class="team-container">
              <h2>Piyush Kumar</h2>
              <p class="title">Absolutely Nothing</p>
              <p>Course - BCA</p>
              <p>inquery.Piyush@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact-section">
      <div class="title-text">
        <h1>Get in Touch</h1>
        <p class="subheading">Fill up the form to get in touch with us.</p>
      </div>
      <div class="contact-container">
        <!-- Contact form section -->
        <div class="contact-box">
          <!-- Left side of the form -->
          <div class="container-left">
            <h3>Fill the Form*</h3>
            <!-- Form -->
            <form id="contactForm" onsubmit="return validateForm()">
              <div class="input-row">
                <div class="input-group">
                  <label>Name*</label>
                  <input
                    type="text"
                    id="name"
                    placeholder="Enter your Name"
                    required
                  />
                </div>

                <div class="input-group">
                  <label>Phone*</label>
                  <input
                    type="text"
                    id="phone"
                    placeholder="+91 1234567890"
                    required
                  />
                </div>
              </div>

              <!-- Input row for Email and Subject -->
              <div class="input-row">
                <div class="input-group">
                  <label>Email*</label>
                  <input
                    type="email"
                    id="email"
                    placeholder="youremail@gmail.com"
                    required
                  />
                </div>

                <div class="input-group">
                  <label>Subject</label>
                  <input type="text" id="subject" placeholder="Inquiry" />
                </div>
              </div>

              <!-- Label for Message textarea -->
              <label>Message*</label>
              <textarea
                rows="10"
                id="message"
                placeholder="Enter your Message"
                required
              ></textarea>
              <button type="submit" class="submit-btn">Send Message ➜</button>
            </form>
          </div>
          <!-- Right side with contact information -->
          <div class="container-right">
            <h3>Reach Us</h3>
            <!-- Table for contact information -->
            <table>
              <tr>
                <td>Email:</td>
                <td>contact@msijanakpuri.com</td>
              </tr>

              <tr>
                <td>Phone:</td>
                <td>+91 011-45656183</td>
              </tr>

              <tr>
                <td>Address:</td>
                <td>
                  Maharaja Surajmail Institute <br />
                  C-4, Janakpuri, <br />
                  Delhi - 110058, India
                </td>
              </tr>
            </table>

            <!-- Map section -->
            <div class="map">
              <!-- Google Map iframe -->
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.2888210618585!2d77.09131724016883!3d28.621104670527558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04afb8dbcfe1%3A0xaff19e718be2136b!2sMaharaja%20Surajmal%20Institute%20Of%20Technology!5e0!3m2!1sen!2sin!4v1711214006526!5m2!1sen!2sin"
                width="800"
                height="275"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="footer-section">
        <footer class="footer">
            <div class="footer-left">
                <img src="images/dark_logo.png" alt="Company Logo">
            </div>
            <div class="footer-right">
                <ul class="social-links">
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                </ul>
            </div>
        </footer>
    </section>
  </body>
</html>