<?php 
	session_start();
	// init variables
		$name = "";
		$job_description = "";
		$id = 0;
		$edit_state = false;
 	// connect to database
	$dbc = mysqli_connect('localhost', 'root', '1234', 'crud');
		// add new record
	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$job_description = $_POST['job_description'];

		$query = "INSERT INTO info (name, job_description) VALUES ('$name', '$job_description')";
		mysqli_query($dbc, $query);
		$_SESSION['msg'] = "Job Description saved";
		header('location: index.php'); // redirect to index.php after insert
	}

	// update record
	if (isset($_POST['update'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$job_description = $_POST['job_description'];
		

		mysqli_query($dbc, "UPDATE info SET name='$name', job_description='$job_description' WHERE id='$id'");
		$_SESSION['msg'] = "Job Description updated!";
		header('location: index.php');
	}

	// delete record
	if (isset($_GET['del'])){
		$id = $_GET['del'];
		mysqli_query($dbc, "DELETE FROM info WHERE id='$id'");
		$_SESSION['msg'] = "Job Description deleted!";
		header('location: index.php');
	}


	// find all records
	$results = mysqli_query($dbc, "SELECT * FROM info")

 ?>