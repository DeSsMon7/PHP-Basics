<?php include('server.php'); 
	
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($dbc, "SELECT * FROM info WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$name = $record['name'];
		$job_description = $record['job_description'];
		$id = $record['id'];
 	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: Create, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

 <?php if (isset($_SESSION['msg'])): ?>
 	<div class="msg">
 		<?php
 			echo $_SESSION['msg'];
 			unset($_SESSION['msg']);
 		?>
 	</div>
 <?php endif ?>

	<table>
		<thead>
		<tr>
		<th>Name</th>
		<th>Job Description</th>
		<th colspan="2">Action</th>			
		</tr>			
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['job_description']; ?></td>
				<td>
					<a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
				</td>
				<td>
					<a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
				</td>
			</tr>		
	    	<?php } ?>
				
		</tbody>
	</table>

	<form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Job Description</label>
			<input type="text" name="job_description" value="<?php echo $job_description; ?>">
		</div>
		<div class="input-group">
			<?php if ($edit_state == false): ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php else: ?>
			<button class="btn" type="submit" name="update" >Update</button>
		<?php endif ?>
		</div>
	</form>

</body>
</html>