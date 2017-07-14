<?php  
session_start();
 require('connect.php');

if (isset($_POST['username']) & isset($_POST['password'])){

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
 
$result = mysqli_query($connection, $query); // die(mysqli_error($connection));
$count = mysqli_num_rows($result);


if ($count == 1){
$_SESSION['username'] = $username;
}else{

$message = "wrong info";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
header("Location: welcome.php");
 
}else{



}
?>


<html>
<head>

<link rel="stylesheet" href="1.css">

<title>Login</title>

</head>

<body>

<h1>Login</h1>

<form action="" method="POST">

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="username" name="username">
	</br>
	</br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="password" name="password">
	</br>
	</br>
	
    <input type="submit" id="btn" value="login">
    <a href="signup.php">Sign Up</a>
  </div>
</form>



</body>
</html>