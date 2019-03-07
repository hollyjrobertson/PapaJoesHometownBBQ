<!DOCTYPE html>
<html>
<title>Papa Joe's Hometown BBQ</title>
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
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#menu" class="w3-bar-item w3-button">Menu</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact</a>
    </div>
  </div>
</div>

<!-- Header -->

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">
  <!-- Menu Section -->
  <div class="w3-container w3-padding-64" id="menu">
    <h1 class="w3-center">Our Menu</h1>
    <div class="w3-col l6 w3-padding-large">
      <form action="processOrder.php" method="post">
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
            <td align="center"><input type="test" name="brisketQty" size="3" maxlength="10"></td>
          </tr>
          <tr>
            <td>Ribs</td>
            <td>$22/lb</td>
            <td align="center"><input type="test" name="ribsQty" size="3" maxlength="10"></td>
          </tr>
          <tr>
            <td>Pulled Pork</td>
            <td>$22/lb</td>
            <td align="center"><input type="test" name="pporkQty" size="3" maxlength="10"></td>
          </tr>
          <tr>
            <td>Turkey</td>
            <td>$19/lb</td>
            <td align="center"><input type="test" name="turkeyQty" size="3" maxlength="10"></td>
          </tr>
          <tr>
            <td>Sausage</td>
            <td>$19/lb</td>
            <td align="center"><input type="test" name="sausageQty" size="3" maxlength="10"></td>
          </tr>
        </table>
      </form>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  &copy; Papa Joe's Hometown BBQ
</footer>

</body>
</html>