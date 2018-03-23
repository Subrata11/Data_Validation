<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'Data_Validation');

if(isset($_POST['Register'])) {						//isset check variable is set or not
    $Full_Name = validate($_POST["Full_Name"]);		//function name
    $Roll_No = validate($_POST["Roll_No"]);
    $Fathers_Name = validate($_POST["Fathers_Name"]);
    $Birth_Date = validate($_POST["Birth_Date"]);
    $Address = validate($_POST["Address"]);
    $Email = validate($_POST["Email"]);
    $Phone_No = validate($_POST["Phone_No"]);
    $Edu_Qua = validate($_POST["Edu_Qua"]);

    //list($m,$d,$y)=explode('-',$Birth_Date);

    if (time() < strtotime('+18 years', strtotime($Birth_Date))) {
        array_push($errors, "Age must be above 18 years old \n");

        //exit;
		//The array_push() function inserts one or more elements to the end of an array. 
    }
    $length = strlen($Roll_No);

    if ($length < 8 || $length >8) {
        array_push($errors, "Invalid Roll Number(Roll Must be 8 Digit) \n");
    }
    if ($length == 8 && ($Roll_No[4] != '5' || $Roll_No[5] != '4')) {
        array_push($errors, "Your department must have to be CSE(Roll Mismatch Error) \n");
    }
    if (count($errors) == 0) {
        $query = "INSERT INTO user_data (Full_Name,Roll_No,Fathers_Name,Birth_Date,Address,Email,Phone_No,Edu_Qua) VALUES ('$Full_Name','$Roll_No','$Fathers_Name','$Birth_Date','$Address','$Email','$Phone_No','$Edu_Qua')";
        mysqli_query($db,$query);
        array_push($errors, "Thank You!!!Registration Successful");
    }
}


function validate($data) {
    $data = trim($data);			//The trim() function removes whitespace
    $data = stripslashes($data);	//stripslashes() function removes backslashes added by the addslashes() function
    $data = htmlspecialchars($data);//htmlspecialchars() function is used to converts special characters
    return $data;
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
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
            <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Registration</a></li>
            <li><a href="admin.php"><span class="glyphicon glyphicon-eye-open"></span> Admin</a></li>
        </ul>
    </div>
</nav>

<!--Form-->
<div class="container">
	<center>
    <h1>Online Registration Form</h1>
	</center>
	
    <br>
    <div class="col-sm-10 col-sm-offset-1 jumbotron">
        <form method = "post" action="register.php">
            <div class="form-group">
                <?php include('errors.php') ?>
            </div>
            <div class="form-group">
                <label for="Full_Name">Name</label>
                <input type="text" class="form-control" id="Full_Name" name="Full_Name"  placeholder="Enter Your Full Name" required>
            </div>
            <div class="form-group">
                <label for="Roll_No">Roll No.</label>
                <input type="number" class="form-control" id="Roll_No" name="Roll_No" placeholder="Enter Your Roll Number" required>
            </div>
            <div class="form-group">
                <label for="Fathers_Name">Father's Name</label>
                <input type="text" class="form-control" id="Fathers_Name" name="Fathers_Name" placeholder="Enter Your Father's Name" required>
            </div>
            <div class="form-group">
                <label for="Birth_Date">Birth Date</label>
                <input type="date" class="form-control" id="Birth_Date" name="Birth_Date" required>
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Your Address" required>
            </div>
            <div class="form-group">
                <label for="Email">Email Address</label>
                <input type="email" class="form-control" id="Email" name="Email"  placeholder="Enter Your Email Address" required>
            </div>
            <div class="form-group">
                <label for="Phone_No">Phone No.</label>
                <input type="text" class="form-control" id="Phone_No" name="Phone_No"  placeholder="Enter Your Phone No." required>
            </div>
            <div class="form-group">
                <label for="Edu_Qua">Educational Qualification</label>
                <input type="text" class="form-control" id="Edu_Qua" name="Edu_Qua" placeholder="Enter Your Educational Qualification" required>
            </div>
            <button type="submit" class="btn btn-primary" name="Register">Register</button>
        </form>
    </div>

    <br>
    <br>
</div>


</body>
</html>
