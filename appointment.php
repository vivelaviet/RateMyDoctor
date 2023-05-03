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
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/index.php">Home</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/viewdoctors.php">View All Doctors</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/adddoctors.php">Add Doctors</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/addcustomers.php">Add/Update Customers</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/viewcustomer.php">View All Customers</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/appointment.php">Appointment</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/contact.php">Contact Us</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/login.php">Login</a>
                </div>
                <div class="col-auto">
                
                    <form class="form-inline" style="white-space:nowrap;">
                        <div class="col-md-auto">
                            <input class="form-control mr-sm-2" type="search" size="15" name="FnameInput" placeholder="Search First Name" aria-label="Search">
                        </div>
                        <div class="col-md-auto">
                            <input class="form-control mr-sm-2" type="search" size="15" name="LnameInput" placeholder="Search Last Name" aria-label="Search">
                        </div>
                        <div class="col-md-auto">
                            <input class="form-control mr-sm-2" type="search" size="8" placeholder="Location" aria-label="Search">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </div>
                    </form>

                </div>
                
          </div>
        </div>
      </nav>
</header>
<body>
    <h1>Appointment</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
        <label >CustomerID:</label>
        <input type="number" class="form-control" name="customerID" placeholder="CustomerID" > 
        <label >Time:</label>
        <input type="time" class="form-control" name="time" placeholder="Time" >
        <label >Date:</label>
        <input type="date" class="form-control" name="date" placeholder="Date" >
        <label >Place:</label>
        <input type="text" class="form-control" name="place" placeholder="Place">
        <label >DoctorID:</label>
        <input type="number" class="form-control" name="doctorID" placeholder="DoctorID" /><br>
        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
	</form>


    <?php
    include_once 'db.php';
    $successMessage = "";
    if (isset($_POST['submit'])) {
        
        if(!$conn)
            echo mysql_error($conn);
            
        // //validated your inputs fields
        $date = $_POST['date'];
        $time = $_POST['time'];
        $place = $_POST['place'];
        $doctorID = $_POST['doctorID'];
        $customerID = $_POST['customerID'];
        // //prepare and bind 
        $sql = $conn->prepare("INSERT INTO appointment (Date,Time,Place,DoctorID,CustomerID) VALUES (?,?,?,?,?)");
        $sql->bind_param("sssii", $date, $time, $place, $doctorID, $customerID);
        
        if ($sql->execute()) {

            echo("Appointment has been added");
        }

        $sql->close();
        $conn->close();
    }
    ?>

   
    
</body>