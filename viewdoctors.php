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
                    <a class="nav-item nav-link" href="/appointment.php">Add/Update Appointment</a>
                </div>
                <div class="col-auto">
                    <a class="nav-item nav-link" href="/View_appointment.php">View All Appointment</a>
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



<form action="" method="post">

<table class="table">
<tr>
<?php 
session_start();
if(!isset($_SESSION['role'])) {
    $_SESSION['role'] = 'customer';
}
if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'scheduler') {
    echo "<td>DoctorID</td>";
}
?>
<td>First Name</td>
<td>Last Name</td>
<td>Specialization</td>
<td>Location</td>
</tr>


<?php
    include_once 'db.php';
    
    
    
    if(isset($_POST['deleteDoctor']) and is_numeric($_POST['deleteDoctor']))
    {
      $delete = $_POST['deleteDoctor'];
      $sql = "DELETE FROM `doctor` where `DoctorID` = '$delete'"; 
      $result = $conn->query($sql);
    }
    



$sql = "SELECT * FROM doctor";
$result = $conn->query($sql);



if($result->num_rows > 0){
    while($results = $result->fetch_assoc()){
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'scheduler') {
        echo "<td>".$results['DoctorID']."</td>";
    }
    echo "<td>".$results['FirstName']."</td>";
    echo "<td>".$results['LastName']."</td>";
    echo "<td>".$results['Specialization']."</td>";
    echo "<td>".$results['Location']."</td>";
    if ($_SESSION['role'] == 'admin') {
        echo '<td><button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="deleteDoctor" value="'.$results['DoctorID'].'" />Delete</button></td>';
    }
    echo '</tr>';
    }
}

// Closing connection
$conn->close();
?>

</table>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>




</body>