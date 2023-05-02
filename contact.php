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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Rate my Doctor</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <div class="row">
                <div class="col">
                    <a class="nav-item nav-link" href="/index.php">Home</a>
                </div>
                <div class="col">
                    <a class="nav-item nav-link" href="/viewdoctors.php">View All Doctors</a>
                </div>
                <div class="col">
                    <a class="nav-item nav-link" href="/adddoctors.php">Add Doctors</a>
                </div>
                <div class="col">
                    <a class="nav-item nav-link active" href="/contact.php">Contact Us</a>
                </div>
                <div class="col">
                    <a class="nav-item nav-link" href="/login.php">Login</a>
                </div>
                <div class="col">
                
                    <form class="form-inline" style="white-space:nowrap;">
                        <div class="col-md-auto">
                            <input class="form-control mr-sm-2" type="search" size="30" placeholder="Search Doctors..." aria-label="Search">
                        </div>
                        <div class="col-md-auto">
                            <input class="form-control mr-sm-2" type="search" size="6" placeholder="Location" aria-label="Search">
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </div>
                    </form>

                </div>
                
          </div>
        </div>
      </nav>
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