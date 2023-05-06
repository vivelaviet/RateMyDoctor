<!-- Viet Nguyen wrote this part 
Responsible for INSERTS and UPDATES of doctors
-->
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
	
    <h1>Add Doctors</h1>



    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
        <br/><label style= "font-size: 20px;">For Update Use (First Name, Last Name)</label><br/>
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
        <br/><br/><label style= "font-size: 20px;">First Name</label><br/>
        <input type="text" class="form-control" name="first" placeholder="First Name">
        <br/><label style= "font-size: 20px;">Last Name</label><br/>
        <input type="text" class="form-control" name="last" placeholder="Last Name">
        <br/><label style= "font-size: 20px;">Specialization</label><br/>
        <input type="text" class="form-control" name="specialization" placeholder="Specialization">
        <br/><label style= "font-size: 20px;">Location</label><br/>
        <input type="text" class="form-control" name="location" placeholder="Location"> 
        <br/>
        <button type="submit" class="btn btn-primary" name="add" value="Add">Add</button>
        <button type="update" class="btn btn-primary" name="update" value="Update">Update</button>
    </form>

    <?php
    
    $successMessage = "";
    
    if (isset($_POST['add'])) {
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