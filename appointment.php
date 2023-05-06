<!-- Vincent Wen
The file add and update appointment into the appointment table
only in the appointment and admin user -->
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
<!-- includes the header information -->
<header>
<?php 
    include_once 'header.php';
    ?>
</header>
<body>
    <!-- for the format  -->
    <h1>Add/Update Appointments</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
        <br /><label style= "font-size: 20px;">For Update Use (Date, Place)</label><br />
        <!-- for update use only -->
        <?php
        include_once 'db.php';
        $sql = "SELECT * FROM appointment";
        $result = $conn->query($sql);
        echo "<select name='appointmentID'>";
        while ($results = $result->fetch_assoc()) {
            echo "<option value='" . $results['AppointmentID'] . "'>" . $results['Date'] . ", ". $results['Place'] . "</option>";
        }
        echo "</select>";
        ?>
        <!-- to add information or change  -->
        <br /><br /><label style= "font-size: 20px;">Date</label>
        <input type="date" class="form-control" name="date" placeholder="Date">
        <br /><label style= "font-size: 20px;">Time</label>
        <input type="time" class="form-control" name="time" placeholder="Time">
        <br /><label style= "font-size: 20px;">Place</label>
        <input type="text" class="form-control" name="place" placeholder="Place">
        <br /><label style= "font-size: 20px;">Doctor Name:</label>
        <!-- gets from the database for doctor id from the doctor table -->
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
        <br /><br /><label style= "font-size: 20px;">Customer Name:</label>
        <!-- gets from the database for customer id from the customer table -->
        <?php
        include_once 'db.php';
        $sql = "SELECT * FROM customer";
        $result = $conn->query($sql);
        echo "<select name='customerID'>";
        while ($results = $result->fetch_assoc()) {
            echo "<option value='" . $results['CustomerID'] . "'>" . $results['FirstName'] . " ". $results['LastName'] . "</option>";
        }
        echo "</select>";
        ?>
        <br /><br />
        <button type="submit" class="btn btn-primary" name="add" value="Add">Add</button>
        <button type="update" class="btn btn-primary" name="update" value="Update">Update</button>
    </form>
    
    <?php
    include_once 'db.php';
    $successMessage = "";
    if (isset($_POST['add'])) {
        if(!$conn)
            echo mysql_error($conn);

        //validated your inputs fields
        $date = $_POST['date'];
        $time = $_POST['time'];
        $place = $_POST['place'];
        $doctorID = $_POST['doctorID'];
        $customerID = $_POST['customerID'];
        //prepare and bind for adding new row into the appointment table using INSERT
        $sql = $conn->prepare("INSERT INTO appointment (Date,Time,Place,DoctorID,CustomerID) VALUES (?,?,?,?,?)");
        $sql->bind_param("sssii", $date, $time, $place, $doctorID, $customerID);

        if ($sql->execute()) {
            echo("Appointment has been added");
        }

        $sql->close();
        $conn->close();
    }
    else if (isset($_POST['update'])) {
        if(!$conn)
            echo mysql_error($conn);

        //validated your inputs fields
        $appointmentID = $_POST['appointmentID'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $place = $_POST['place'];
        $doctorID = $_POST['doctorID'];
        $customerID = $_POST['customerID'];

        //updating the row of the appointment table
        $sql = $conn->prepare("UPDATE appointment SET Date=?, Time=?, Place=?, DoctorID=?, CustomerID=? WHERE AppointmentID=?");
        $sql->bind_param("sssiii", $date, $time, $place, $doctorID, $customerID, $appointmentID);

        // Check if the query was successful
        if ($sql->execute()) {
            echo "Appointment has been updated";
        } else {
            echo "Error updating appointment: " . $conn->error;
        }

    $sql->close();
    $conn->close();
    }   
?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>