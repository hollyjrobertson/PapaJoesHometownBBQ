<?php 
    $result = "";
    define('SITE_KEY', '6LcxA5YUAAAAAI5ZHIqElAt19uug1Y71q7YDH5bd');
    define('SECRET_KEY', '6LcxA5YUAAAAAALFSHTAvG8wk7_gpaL7nFdt3r5Q');

    if(isset($_POST['submit'])) {

      function getCaptcha($SecretKey){
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }

    $Return = getCaptcha($_POST['g-recaptcha-response']);

      if($Return->success == true && $Return->score > 0.5) {

        $name = $_POST['name'];
        $mailFrom = $_POST['email'];
        $message = $_POST['message'];

        $mailTo = "hollyjrobertson@hollyjrobertson.com";
        $headers = "From:".$mailFrom;
        $subject = "Papa Joe, You have mail from ".$name;
        $txt = "You have received an e-mail from ".$name.":\r\n"."\r\n".$message;

        if (mail($mailTo, $subject, $txt, $headers)){
            $result = "Thank you ".$name." for your message. <br>I will get back with you ASAP!";
        }
        else {
            $result = "Your message did not send. <br>I am working on this right now.";
        }
      }
      else {
        $result = "Google thinks you're a robot. <br>If you're not, please email us.";
      }
}
?>
<!DOCTYPE html>
<html>
<title>Papa Joe's Hometown BBQ</title>
<script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="assets/styles/main.css">
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-padding w3-card" style="letter-spacing:4px;">
    <a href="index.php"><img src="assets/images/black_logo.png"></a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="index.php" class="w3-bar-item w3-button">Home</a>
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#menu" class="w3-bar-item w3-button">Menu</a>
      <a href="order.php" class="w3-bar-item w3-button">Order Now</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:335px;" id="home">
  <img class="w3-image" src="assets/images/banner.png" alt="Papa Joe's Home Page" style="width:100%;">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="assets/images/us.jpg" class="w3-round w3-image" alt="About Us Section" style="width:100%">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About Us</h1><br>
      <h5 class="w3-center">Good People, Great Food</h5>
      <p class="w3-large">Howdy folks! My name is Joel and my beautiful wife is Kate. We started this business with a couple hundred dollars from each paycheck and it has take two years to get this business up and running! The reason for this adventure is because we have custody of grandchildren and we want to teqach them that anything is possible if you're willing to work for your dreams. The ultimate goal is to teach them the business from the group up so that someday they can continue on the tradition of Good People, Great Food. So if you're looking for some good old fashioned hometown southern BBQ, come see us at Papa Joe's Hometown BBQ! </p>

      <p class="w3-large">All of our food is <span class="w3-tag w3-light-grey">locally sourced</span> and smoked daily.</p>
   
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Our Menu</h1><br>
      <h2>Meats</h2>
      <h4>Brisket - $25/lb</h4>
      <p></p>
      <h4>Ribs - $22/lb</h4>
      <p></p>
      <h4>Pulled Pork - $22/lb</h4>
      <p></p>
      <h4>Turkey - $19/lb</h4> 
      <p></p>
      <h4>Sausage - $19/link</h4><br>
      <p></p>
      <p></p>
      <h2>Sandwiches</h2>
      <h4>Brisket - $12.50</h4>
      <p></p>
      <h4>Pulled Pork - $11</h4>
      <p></p>
      <h4>Turkey - $8.50</h4>
      <p></p>
      <h4>Chopped Beef - $8</h4> 
      <p></p>
      <h4>Sausage - $8</h4><br>
      <p></p>
      <p><a href="menu.html"><button class="w3-button w3-light-grey w3-center" type="submit">See More</button></a></p>
    </div>
  
    <div class="w3-col l6 w3-padding-large">
      <img src="assets/images/banner.jpg" class="w3-round w3-image" alt="Menu" style="width:100%">
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1 id="contact">Contact</h1><br>
    <h3><?php echo $result; ?></h3>
    <p>We would love to hear from you.</p>
    <p class="w3-text-blue-grey w3-large"><b>66 South Main St. Pataskala, OH 43062</b></p>
    <p>You can also contact us by phone 614-000-0000, email us at <a href="mailto:contact@papajoeshometownbbq.com">contact@papajoeshometownbbq.com</a>, or you can send us a message here:</p>
    <form action="index.php#contact" method="post">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="name"></p>
      <p><input class="w3-input w3-padding-16" type="email" placeholder="Email" required name="email"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="message"></p>
      <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" /><br>
      <p><button class="w3-button w3-light-grey w3-section" name="submit" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  &copy; Papa Joe's Hometown BBQ
</footer>
    <script>
    grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'})
    .then(function(token) {
        //console.log(token);
        document.getElementById('g-recaptcha-response').value=token;
    });
    });
    </script>
</body>
</html>
