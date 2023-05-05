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
    <h1>Add/Update Ratings</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
    <?php
        include_once 'db.php';
        $sql = "SELECT * FROM ratings";
        $result = $conn->query($sql);
        echo "<select name='ratingID'>";
        while ($results = $result->fetch_assoc()) {
            echo "<option value='" . $results['RatingID'] . "'>" . $results['Score'] . ", ". $results['Comment'] . "</option>";
        }
        echo "</select>";
        ?>
        <input type="number" class="form-control" name="score" placeholder="Score">
        <input type="text" class="form-control" name="comment" placeholder="Comment">
        <input type="date" class="form-control" name="date" placeholder="Date">
        <input type="number" class="form-control" name="doctorID" placeholder="DoctorID"> 
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
        $score = $_POST['score'];
        $comment = $_POST['comment'];
        $date = $_POST['date'];
        $doctorID = $_POST['doctorID'];
        //prepare and bind 
        $sql = $conn->prepare("INSERT INTO ratings (Score,Comment,Date,DoctorID) VALUES (?,?,?,?)");
        $sql->bind_param("sssi", $score, $comment, $date, $doctorID);

        if ($sql->execute()) {
            echo("Rating has been added");
        }

        $sql->close();
        $conn->close();
    }
    else if (isset($_POST['update'])) {
        if(!$conn)
            echo mysql_error($conn);

        //validated your inputs fields
        $ratingID = $_POST['ratingID'];
        $score = $_POST['score'];
        $comment = $_POST['comment'];
        $date = $_POST['date'];
        $doctorID = $_POST['doctorID'];

        $sql = $conn->prepare("UPDATE ratings SET Score=?, Comment=?, Date=?, DoctorID=? WHERE RatingID=?");
        $sql->bind_param("sssii", $score, $comment, $date, $doctorID, $ratingID);

        // Check if the query was successful
        if ($sql->execute()) {
            echo "Rating has been updated";
        } else {
            echo "Error updating rating: " . $conn->error;
        }

    $sql->close();
    $conn->close();
    }   
?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>