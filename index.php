<?php
    $result = "";

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $mailFrom = $_POST['email'];
        $message = $_POST['message'];

        $mailTo = "hollyjrobertson@hollyjrobertson.com";
        $headers = "From:".$mailFrom;
        $subject = "You have mail from ".$name;
        $txt = "You have received an e-mail from ".$name.":\r\n"."\r\n".$message;

        if (mail($mailTo, $subject, $txt, $headers)){
            $result = "Thank you ".$name." for your message. I will get back with you ASAP!<br>
            I hope you have a great day!";
        }
        else {
            $result = "Mail did not send";
        }
}
?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Papa Joe's Hometown BBQ</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body>

        <!-- Header -->
            <header id="header">
                <div class="logo"><a href="index.php">Papa Joe's Hometown BBQ</a></div>
                <a href="#menu"><span>Menu</span></a>
            </header>

        <!-- Nav -->
            <nav id="menu">
                <ul class="links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="menu.html">Our Menu</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>

        <!-- Banner -->
            <section id="banner" class="bg-img" data-bg="banner.jpg">
                <div class="inner">
                    <header>
                        <h1>Papa Joe's Hometown BBQ</h1>
                    </header>
                </div>
                <a href="#one" class="more">Learn More</a>
            </section>

        <!-- One / About Us-->
            <section id="one" class="wrapper post bg-img" data-bg="banner1.jpg">
                <div class="inner">
                    <article class="box">
                        <header>
                            <h2>About Us</h2>
                        </header>
                        <div class="content">
                            <p>Coming Soon</p>
                            <p>Opening in April 2019.</p>
                        </div>
                        <footer>
                            <a href="about.html" class="button alt">Learn More</a>
                        </footer>
                    </article>
                </div>
                <a href="#two" class="more">Learn More</a>
            </section>

        <!-- Two / Order -->
            <section id="two" class="wrapper post bg-img" data-bg="banner2.jpg">
                <div class="inner">
                    <article class="box">
                        <header>
                            <h2>Order Online</h2>
                        </header>
                        <div class="content">
                            <p>Coming Soon</p>
                            <p>Opening in April 2019.</p>
                        </div>
                        <footer>
                            <a href="order.html" class="button alt">Order Now</a>
                        </footer>
                    </article>
                </div>
                <a href="#three" class="more">Learn More</a>
            </section>
            
        <!-- Three / Services-->
            <section id="four" class="wrapper post bg-img" data-bg="banner3.jpg">
                <div class="inner">
                    <article class="box">
                        <header>
                            <h2>Services</h2>
                        </header>
                        <div class="content">
                            <p>Coming Soon</p>
                            <p>Opening in April 2019.</p>
                        </div>
                        <footer>
                            <a href="services.html" class="button alt">Learn More</a>
                        </footer>
                    </article>
                </div>
            </section>

        <!-- Footer -->
            <footer id="footer">
                <div class="inner">
                
                    <h2 id="contact">Contact Us</h2>
                    <h3><center><?php echo $result; ?></center></h3>
                
                    <form action="index.php#contact" method="post">

                        <div class="field half first">
                            <label for="name">* Name: </label>
                            <input type="text" name="name" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="field half">
                            <label for="myEmail">* E-mail: </label>
                            <input type="email" name="email" id="email" placeholder="Your E-mail" required>
                        </div>
                        <div class="field">
                            <label for="myComments">* Message: </label>
                            <textarea name="message" id="message" rows=6 placeholder="Your Message" required></textarea>
                        </div>
                        <ul class="actions">
                            <li><input type="submit" name="submit" id="mySubmit" class="button alt"></li>
                        </ul>
                        <p>Required *</p>
                    </form>

                    <ul class="icons">
                        <li><a href="#" class="icon round fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon round fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon round fa-instagram"><span class="label">Instagram</span></a></li>
                    </ul>

                    <div class="copyright">
                        &copy;Papa Joe's Hometown BBQ 
                    </div>

                </div>
            </footer>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>