<?php
$servername = "localhost";
$database = "enter_your_database's_name";
$username = "enter_your_username";
$password = "enter_your_password";

$con =mysqli_connect($servername, $username, $password, $database);
if ($con) {
	echo "Thank You Very Much;Your Message Has Been Sent Successfully!";
}
else{
	echo "Sorry,Your Message Could Not Be Sent Due To Some Technical Issue!";
}
mysqli_select_db($con,'usermessages');
$user = $_POST['user'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$message = $_POST['message'];
$query = "insert into userinputeddata(user,mobile,email,message) values('$user','$mobile','$email','$message')";
mysqli_query($con,$query);
?>
