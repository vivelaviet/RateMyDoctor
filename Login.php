<!-- Viet Nguyen wrote this part 
Implemented the three roles so that there is a variable that can be used within
the session. This means that the roles can persist between pages. This was
supposed to be for our fourth member but they are not showing up so we made
do with simply buttons that picked your user role instead of a login/register page-->
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

    <?php 
    include_once 'db.php';


    if (isset($_POST['admin'])) {
        $_SESSION['role'] = 'admin';
        echo "<meta http-equiv='refresh' content='0'>";
    } else if (isset($_POST['scheduler'])) {
        $_SESSION['role'] = 'scheduler';
        echo "<meta http-equiv='refresh' content='0'>";
    } else if (isset($_POST['customer'])) {
        $_SESSION['role'] = 'customer';
        echo "<meta http-equiv='refresh' content='0'>";
    }

    echo "You are a ".$_SESSION['role'];

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">

        <center>
        <button type="admin" class="btn btn-danger" name="admin" value="admin">Admin</button>
        <button type="scheduler" class="btn btn-info" name="scheduler" value="scheduler">Scheduler</button>
        <button type="customer" class="btn btn-primary" name="customer" value="customer">Customer</button>
        </center>
    </form>



    <!--
    <h1>Login</h1>
	<form>
        <p>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <input type="submit" value="Login">
        </p>
	</form>

    <h1>Register</h1>
	<form>
        <p>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <input type="submit" value="Register">
        </p>
	</form>
-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>