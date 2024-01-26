<?php
$Name = $_POST['username'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];


// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
	echo "$conn->connect_error";
	die("Connection Failed : " . $conn->connect_error);
} else {
	$stmt = $conn->prepare("insert into registration(Name, email, gender, password,) values(?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssi", $Name, $email, $gender, $password);
	$execval = $stmt->execute();
	echo $execval;
	echo "Registration successfully...";
	$stmt->close();
	$conn->close();
}
?>