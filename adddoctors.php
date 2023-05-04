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
                <?php 
                session_start();
                if(!isset($_SESSION['role'])) {
                    $_SESSION['role'] = 'customer';
                }
                if ($_SESSION['role'] == 'admin') {
                    echo '
                    <div class="col-auto">
                    <a class="nav-item nav-link" href="/adddoctors.php">Add/Update Doctors</a>
                    </div>';
                }
                ?>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/addcustomers.php">Add/Update Customers</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/viewcustomer.php">View All Customers</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/appointment.php">Add/Update Appointment</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/View_appointment.php">View All Appointment</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/addratings.php">Add/Update Ratings</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/viewratings.php">View All Ratings</a>
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
	
    <h1>Add Doctors</h1>



    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
        <?php
        include_once 'db.php';
        $sql = "SELECT * FROM doctor";
        $result = $conn->query($sql);

        echo "<select name='doctorID'>";
        while ($results = $result->fetch_assoc()) {
            echo "<option value='" . $results['DoctorID'] . "'>" . $results['FirstName'] . " ". $results['LastName'] . "</option>";
        }
        echo "</select>";
        ?>
        <input type="text" class="form-control" name="first" placeholder="First Name">
        <input type="text" class="form-control" name="last" placeholder="Last Name">
        <input type="text" class="form-control" name="specialization" placeholder="Specialization">
        <input type="text" class="form-control" name="location" placeholder="Location"> 
        <button type="update" class="btn btn-primary" name="update" value="Submit">Update</button>
        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
    </form>

    <?php
    
    $successMessage = "";
    
    if (isset($_POST['submit'])) {
        if(!$conn)
            echo mysql_error($conn);

        //validated your inputs fields
        $first = $_POST['first'];
        $last = $_POST['last'];
        $specialization = $_POST['specialization'];
        $location = $_POST['location'];

        //prepare and bind 
        $sql = $conn->prepare("INSERT INTO doctor (FirstName,LastName,Specialization, Location) VALUES (?,?,?,?)");
        $sql->bind_param("ssss", $first, $last, $specialization, $location);

        if ($sql->execute()) {
            echo("Doctor has been added");
        }

        $sql->close();
        $conn->close();
    } else if (isset($_POST['update'])) {
        if(!$conn)
            echo mysql_error($conn);

        //validated your inputs fields
        $doctorID = $_POST['doctorID'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $specialization = $_POST['specialization'];
        $location = $_POST['location'];
        

        //prepare and bind 
        $sql = $conn->prepare("UPDATE doctor SET FirstName=?, LastName=?,Specialization=?, Location=? WHERE DoctorID=?");
        $sql->bind_param("ssssi", $first, $last, $specialization, $location,$doctorID);

        if ($sql->execute()) {
            echo("Doctor has been updated");
        }

        $sql->close();
        $conn->close();
    }

?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>