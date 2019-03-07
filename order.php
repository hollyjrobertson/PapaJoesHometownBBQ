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
        $number = $_POST['number'];
        $message = $_POST['message'];
        $brisketQty = $_POST['brisketQty'];
        $ribsQty = $_POST['ribsQty'];
        $pporkQty = $_POST['pporkQty'];
        $turkeyQty = $_POST['turkeyQty'];
        $sausageQty = $_POST['sausageQty'];
        $food = array($brisketQty, $ribsQty, $pporkQty, $turkeyQty, $sausageQty);

        $mailTo = "hollyjrobertson@hollyjrobertson.com";
        $headers = "From:".$mailFrom;
        $subject = "NEW ORDER! From: ".$name;
        $txt = "You have received an order from "."\r\n".
        $name."\r\n"."Their number is ".$number." and email is ".$mailFrom."\r\n"."\r\n"."They have ordered:"."\r\n"."\r\n".
        "Brisket by the pound: ".$brisketQty."\r\n".
        "Ribs by the pound: ".$ribsQty."\r\n".
        "Pulled pork by the pound: ".$pporkQty."\r\n".
        "Turkey by the pound: ".$turkeyQty."\r\n".
        "Sausage by the link: ".$sausageQty."\r\n"."\r\n".
        "Their specil instructions are: ".$message;


        $message;

        if (mail($mailTo, $subject, $txt, $headers)){
            $result = "Thank you ".$name." for your order. We are working on it now.";
        }
        else {
            $result = "Your order did not send. I am working on this right now.";
        }
      }
      else {
        $result = "Google thinks you're a robot. If you're not, please email us.";
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
      <a href="index.php#about" class="w3-bar-item w3-button">About</a>
      <a href="menu.html" class="w3-bar-item w3-button">Menu</a>
      <a href="order.php" class="w3-bar-item w3-button">Order Now</a>
      <a href="index.php#contact" class="w3-bar-item w3-button">Contact</a>
    </div>
  </div>
</div>

<!-- Header -->

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">
  <!-- Menu Section -->
  <div class="w3-container w3-padding-64" id="menu">
    <h1 class="w3-center">Our Menu</h1>
    <h3><?php echo $result; ?>
    <div class="w3-col l6 w3-padding-large">
      <form action="" method="post">
        <table>
           <tr class="header">
            <td><h3>Meats</h3></td>
          </tr>
          <tr>
            <td width=150>Item<br>&nbsp;</td>
            <td width=100>Price<br>&nbsp;</td>
            <td width=15>Quantity<br>&nbsp;</td>
          </tr>
          <tr>
            <td>Brisket</td>
            <td>$25/lb</td>
            <td align="center"><input type="text" name="brisketQty" size="3" maxlength="10"></td>
          </tr>
          <tr>
            <td>Ribs</td>
            <td>$22/lb</td>
            <td align="center"><input type="text" name="ribsQty" size="3" maxlength="10"></td>
          </tr>
          <tr>
            <td>Pulled Pork</td>
            <td>$22/lb</td>
            <td align="center"><input type="text" name="pporkQty" size="3" maxlength="10"></td>
          </tr>
          <tr>
            <td>Turkey</td>
            <td>$19/lb</td>
            <td align="center"><input type="text" name="turkeyQty" size="3" maxlength="10"></td>
          </tr>
          <tr>
            <td>Sausage</td>
            <td>$19/lb</td>
            <td align="center"><input type="text" name="sausageQty" size="3" maxlength="10"></td>
          </tr>
        </table>
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" /><br>
        <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="name"></p>
        <p><input class="w3-input w3-padding-16" type="email" placeholder="Email" required name="email"></p>
        <p><input class="w3-input w3-padding-16" type="phone" placeholder="Phone Number" required name="number"></p>
        <p><input class="w3-input w3-padding-16" type="text" placeholder="Special Instructions" required name="message"></p>
        <input type="submit" name="submit">
      </form>
    </div>
  </div>
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