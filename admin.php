<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'Data_Validation');
// If Login button is pressed
if(isset($_POST['login'])) {
    $Email= $_POST["Email"];
    $Password = $_POST["Password"];

    if(empty($Email)) {
        array_push($errors, "Email address is required");
    }
    if(empty($Password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        // $password = md5($password);
        $query = "SELECT * FROM admin WHERE Email='$Email' AND Password='$Password'";
        $results = mysqli_query($db, $query);   // Retrive data from database
        $flag = mysqli_num_rows($results);

        if ( $flag == 1) { // If the query selects only one row then log in
            header('location: view.php');
        }else {
            array_push($errors, "Wrong Email or Password");
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--Nav Bar-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Online Registration</a>
        </div>
        <ul class="nav navbar-nav">
            
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Registration</a></li>
            <li><a href="admin.php"><span class="glyphicon glyphicon-log-in"></span> Admin</a></li>
        </ul>
    </div>
</nav>
<br>
<br>
<!--Form-->
<div class="container col-sm-8 col-sm-offset-2 jumbotron">
    <center><h3>Admin Login Form</h3> </center>
    <br>
    <form method = "post" action="admin.php">
	
	
        <div class="form-group">
            <?php include('errors.php') ?>
        </div>
		
        <div class="form-group ">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="Email" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
		
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="Password" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-primary"  name="login" >Log In</button>
    </form>
</div>


</body>
</html>
