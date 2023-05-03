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
                    <a class="nav-item nav-link" href="/addcustomers.php">Add Customers</a>
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
    <h1>Add/Update Customer</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
        <input type="number" class="form-control" name="id" placeholder="id for update ONLY">
        <input type="text" class="form-control" name="first" placeholder="First Name">
        <input type="text" class="form-control" name="last" placeholder="Last Name">
        <input type="number" class="form-control" name="age" placeholder="Age">
        <input type="text" class="form-control" name="insurance" placeholder="Insurance"> 
        <input type="text" class="form-control" name="password" placeholder="Password"> 
        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
        <button type="update" class="btn btn-primary" name="update" value="Update">Update</button>
    </form>
    
    <?php
    include_once 'db.php';
    $successMessage = "";
    
    if (isset($_POST['submit'])) {
        if(!$conn)
            echo mysql_error($conn);

        //validated your inputs fields
        $first = $_POST['first'];
        $last = $_POST['last'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $insurance = $_POST['insurance'];
        //prepare and bind 
        $sql = $conn->prepare("INSERT INTO customer (FirstName,LastName,Password,Age, Insurance) VALUES (?,?,?,?,?)");
        $sql->bind_param("sssis", $first, $last, $password, $age, $insurance);

        if ($sql->execute()) {
            echo("Customer has been added");
        }

        $sql->close();
        $conn->close();
    }
    else if (isset($_POST['update'])) {
        if(!$conn)
            echo mysql_error($conn);

        //validated your inputs fields
        $first = $_POST['first'];
        $last = $_POST['last'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $insurance = $_POST['insurance'];
        $id=$_POST['id'];


        $sql = $conn->prepare("UPDATE customer SET FirstName=?, LastName=?, Password=?, Age=?, Insurance=? WHERE CustomerID=?");
        $sql->bind_param("sssisi", $first, $last, $password, $age, $insurance, $id);

        // Check if the query was successful
        if ($sql->execute()) {
            echo "Customer has been updated";
        } else {
            echo "Error updating customer: " . $conn->error;
        }

    $sql->close();
    $conn->close();
    }   

?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>


