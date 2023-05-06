<!-- Vincent Wen
This code is a print the view of the appointment table using select
For the user scheduler and the admin the it will allow the user to delete row in a appointment using delete -->
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
    <!-- include the header -->
<?php 
    include_once 'header.php';
    ?>
</header>


<body>
    <!-- Creates table -->
    <h1>View All Appointment</h1>
    <form action="" method="post">
    <table class="table">
    <tr>
    <td>AppointmentID</td>
    <td>Date</td>
    <td>Time</td>
    <td>Place</td>
    <td>Doctor Name</td>
    <td>Customer Name</td>
    </tr>
    <?php
    include_once 'db.php';
    //uses the delete command to delete but only for scheduler or admin
    if(isset($_POST['deleteAppointment']) and is_numeric($_POST['deleteAppointment']))
    {
      $delete = $_POST['deleteAppointment'];
      $sql = "DELETE FROM `appointment` where `AppointmentID` = '$delete'"; 
      $result = $conn->query($sql);
    }
    
    $sql = "SELECT * FROM appointment";
    $result = $conn->query($sql);
    
    
    
    if($result->num_rows > 0){
    while($results = $result->fetch_assoc()){
        // uses the select the  doctor id to use for drop down menu
    $sql1 = "SELECT FirstName, LastName FROM doctor WHERE DoctorID=" . $results['DoctorID'];
    $result1 = $conn->query($sql1);
    $doctor = $result1->fetch_assoc();
    $dfullname = $doctor['FirstName'] . ' ' . $doctor['LastName'];
    // uses the select the  customer id to use for drop down menu
    $sql2 = "SELECT FirstName, LastName FROM customer WHERE CustomerID=" . $results['CustomerID'];
    $result2 = $conn->query($sql2);
    $customer = $result2->fetch_assoc();
    $cfullname = $customer['FirstName'] . ' ' . $customer['LastName'];
    //print the information
    echo "<td>".$results['AppointmentID']."</td>";
    echo "<td>".$results['Date']."</td>";
    echo "<td>".$results['Time']."</td>";
    echo "<td>".$results['Place']."</td>";
    echo "<td>".$dfullname."</td>";
    echo "<td>".$cfullname."</td>";
    if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'scheduler') {
        echo '<td><button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="deleteAppointment" value="'.$results['AppointmentID'].'" />Delete</button></td></tr>"';
    }
    }
    }
    
    
    // Closing connection
    $conn->close();
    ?>
    
    </table>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    
    
    
    </body>