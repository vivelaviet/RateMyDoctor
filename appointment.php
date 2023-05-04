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
    <h1>Add Appointment</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
        <input type="number" class="form-control" name="id" placeholder="id for update ONLY">
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
        <button type="submit" class="btn btn-primary" name="add" value="Add">Add</button>
        <button type="update" class="btn btn-primary" name="update" value="Update">Update</button> 
	</form>

    
    <?php
    include_once 'db.php';
    $successMessage = "";
    if (isset($_POST['add'])) {
        
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
    else if (isset($_POST['update'])) {
        if(!$conn)
            echo mysql_error($conn);

        //validated your inputs fields
        $date = $_POST['date'];
        $time = $_POST['time'];
        $place = $_POST['place'];
        $doctorID = $_POST['doctorID'];
        $customerID = $_POST['customerID'];
        $id=$_POST['id'];


        $sql = $conn->prepare("UPDATE appointment SET Date=?,Time=?,Place=?,DoctorID=?,CustomerID=? WHERE AppointmentID=?");
        $sql->bind_param("sssiii", $date, $time, $place, $doctorID, $customerID,$id);

        // Check if the query was successful
        if ($sql->execute()) {
            echo "Appointment has been updated";
        }

    $sql->close();
    $conn->close();
    }   
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</body>