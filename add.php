<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$sql = "INSERT INTO members (firstname, lastname, address) VALUES ('$firstname', '$lastname', '$address')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>

<?php 

session_start();
$conn = mysqli_connect("localhost", "root", "", "mydatabase");

if (!isset($_POST['save_select'])) {

	$chef = $_POST['chef'];

	$query = "INSERT INTO mydatabase (chef) VALUES ('$chef')";
    $query_run = mysqli_query($conn, $query);

	if($query_run){
		$_SESSION['status'] = "Data Added!";
		header("Location: C:\xampp\htdocs\exam\add_modal.php");
	}else{
		$_SESSION['status'] = "Not inserted!";
		header("Location: C:\xampp\htdocs\exam\add_modal.php");
	}
}

?>