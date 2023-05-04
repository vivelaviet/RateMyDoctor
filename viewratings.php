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

    <h1>View All Ratings</h1>
    <form action="" method="post">
    <table class="table">
    <tr>
    <td>RatingID</td>
    <td>Score</td>
    <td>Comment</td>
    <td>Date</td>
    <td>DoctorID</td>
    </tr>
    <?php
    include_once 'db.php';

    if(isset($_POST['deleteRating']) and is_numeric($_POST['deleteRating']))
    {
      $delete = $_POST['deleteRating'];
      $sql = "DELETE FROM `ratings` where `RatingID` = '$delete'"; 
      $result = $conn->query($sql);
    }
    
    $sql = "SELECT * FROM ratings";
    $result = $conn->query($sql);
    
    
    
    if($result->num_rows > 0){
    while($results = $result->fetch_assoc()){
    echo "<td>".$results['RatingID']."</td>";
    echo "<td>".$results['Score']."</td>";
    echo "<td>".$results['Comment']."</td>";
    echo "<td>".$results['Date']."</td>";
    echo "<td>".$results['DoctorID']."</td>";
    echo '<td><button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="deleteRating" value="'.$results['RatingID'].'" />Delete</button></td></tr>"';
    }
    }
    
    
    // Closing connection
    $conn->close();
    ?>
    
    </table>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    
    
    
    </body>