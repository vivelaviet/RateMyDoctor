<!-- Vincent Wen
This code is a print the view of the customer table using select
For the user customer and the admin the it will allow the user to delete row in a customer using delete -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Home</title>
<!-- gets the header -->
</head>
<header>
<?php 
    include_once 'header.php';
    ?>
</header>


<body>
    <!-- format for the table -->
    <h1>View All Customers</h1>
    <form action="" method="post">
    <table class="table">
    <tr>
    <td><strong>CustomerID</strong></td>
    <td><strong>First Name</strong></td>
    <td><strong>Last Name</strong></td>
    <td><strong>Age</strong></td>
    <td><strong>Insurance</strong></td>
    </tr>
    <?php
    include_once 'db.php';
//delete customer using DELETE
    if(isset($_POST['deleteCustomer']) and is_numeric($_POST['deleteCustomer']))
    {
      $delete = $_POST['deleteCustomer'];
      $sql = "DELETE FROM `customer` where `CustomerID` = '$delete'"; 
      $result = $conn->query($sql);
    }
    
    $sql = "SELECT * FROM customer";
    $result = $conn->query($sql);
    
    
    
    //prints the information
    if($result->num_rows > 0){
    while($results = $result->fetch_assoc()){
    echo "<td>".$results['CustomerID']."</td>";
    echo "<td>".$results['FirstName']."</td>";
    echo "<td>".$results['LastName']."</td>";
    echo "<td>".$results['Age']."</td>";
    echo "<td>".$results['Insurance']."</td>";
    if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'customer') {
        echo '<td><button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="deleteCustomer" value="'.$results['CustomerID'].'" />Delete</button></td></tr>"';
    }
    echo "</tr>";
    }
    }
    
    
    // Closing connection
    $conn->close();
    ?>
    
    </table>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    
    
    
    </body>