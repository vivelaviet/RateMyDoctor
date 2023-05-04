<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Home</title>
</head>
<header>
<?php 
    include_once 'header.php';
    ?>
</header>
<body>
    
    <h1>Contact Us</h1>
    <p>Get in touch with us using the form below:</p>
    <form action="/submit-contact-form" method="post">
      <label style= "text-indent: 50px; font-size: 25px;" for="name">Name:</label>
      <input style= "font-size: 20px;" type="text" id="name" name="name" required /><br ><br />

      <label style= "text-indent: 50px; font-size: 25px;" for="email">Email:</label>
      <input style= "font-size: 20px;" type="email" id="email" name="email" required /><br ><br />

      <label style= "text-indent: 50px; font-size: 25px;" for="message">Message:</label>
      <textarea style= "font-size: 20px;"  id="message" name="message" rows="5" cols="30" required></textarea><br ><br />

      <input  type="submit" value="Submit" />
    </form>
    <p>You can also reach us by phone or email:</p>
    <ul>
      <li>Phone: 999-999-9999</li>
      <li>Email: Admin@rate_my.com</li>
    </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>