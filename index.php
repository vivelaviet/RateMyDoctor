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
    

	

	<table class="table">
    <tr>
    <?php 
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
    if (isset($_GET['FnameInput']) || isset($_GET['LnameInput']) || isset($_GET['locationInput'])) {
        
        // Initialize the WHERE clause
        $whereClause = "WHERE 1=1";
        
        // Check if first name is provided
        if (isset($_GET['FnameInput'])) {
            $fname = $_GET['FnameInput'];
            $whereClause .= " AND FirstName LIKE '%" . $fname . "%'";
        }
        
        // Check if last name is provided
        if (isset($_GET['LnameInput'])) {
            $lname = $_GET['LnameInput'];
            $whereClause .= " AND LastName LIKE '%" . $lname . "%'";
        }
        
        // Check if location is provided
        if (isset($_GET['locationInput'])) {
            $location = $_GET['locationInput'];
            $whereClause .= " AND Location LIKE '%" . $location . "%'";
        }
        
        $sql = "SELECT * FROM doctor " . $whereClause;
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($results = $result->fetch_assoc()) {
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
    }

    
    
    // Closing connection
    $conn->close();
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>