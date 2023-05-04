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
    <h1>Add/Update Customer</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
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
        <input type="text" class="form-control" name="first" placeholder="First Name">
        <input type="text" class="form-control" name="last" placeholder="Last Name">
        <input type="number" class="form-control" name="age" placeholder="Age">
        <input type="text" class="form-control" name="insurance" placeholder="Insurance"> 
        <input type="text" class="form-control" name="password" placeholder="Password"> 
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
        $customerID = $_POST['customerID'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $insurance = $_POST['insurance'];


        $sql = $conn->prepare("UPDATE customer SET FirstName=?, LastName=?, Password=?, Age=?, Insurance=? WHERE CustomerID=?");
        $sql->bind_param("sssisi", $first, $last, $password, $age, $insurance, $customerID);

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


