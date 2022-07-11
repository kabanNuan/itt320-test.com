<?php

	include("connection.php");
	
	if(!empty($_POST['search'])) {
		$sql = "SELECT * FROM student JOIN parent USING (stu_id) WHERE stu_id = '".$_POST['search']."'|| program ='".$_POST['search2']."'";
		$query = $conn -> query($sql);
		$row = $query -> fetch_assoc();
	}else{
		$sql = "SELECT * FROM student JOIN parent USING (stu_id)";
		$query = $conn -> query($sql);
		$row = $query -> fetch_assoc();
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	
	<body>
		<?php include("navbar.php");?>
		
		<div align="center">
			<h1>Student's Info</h1>
			
			<hr><br>
			
			<form method ="post" action="info.php">
				<input type="text" name="search" placeholder="Enter Student ID">
				<input type="text" name="search2" placeholder="Program">
				<input type="submit" value="search">
			</form>
			
			<table border="1">
				<tr>
					<th>Name</th>
					<th>ID</th>
					<th>Program</th>
					<th>Gender</th>
					<th>About</th>
					<th>Father's name</th>
					<th>Father's No</th>
					<th>Mother's Name</th>
					<th>Mother's No</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
				
				<?php do { ?>
				<tr>
					<td><a href="detail.php?id=<?php echo $row['stu_id']; ?>"><?php echo $row['stu_name']; ?></a></td>
					<td><?php echo $row['stu_id']; ?></td>
					<td><?php echo $row['program']; ?></td>
					<td><?php echo $row['gender']; ?></td>
					<td><?php echo $row['about']; ?></td>
					<td><?php echo $row['father_name']; ?></td>
					<td><?php echo $row['father_no']; ?></td>
					<td><?php echo $row['mother_name']; ?></td>
					<td><?php echo $row['mother_no']; ?></td>
					<td><?php echo $row['address']; ?></td>
					<td><a href="editstudent.php?id=<?php echo $row['rec_id']; ?>">Edit</a> /
					<a href ="deletestudent.php?id=<?php echo $row['stu_id']; ?>" onclick="return check()">Delete</a></td>
				</tr>
				<?php } while($row = $query -> fetch_assoc()) ?>
			</table>
			<td><a href="index.php" Target="blank">Insert New Student Info</a>
		</div>
	</body>
	
	<script>
		function check() {
			//function confirm() will produce an alert box which will return true or false
			var choice = confirm("Are you sure you want to remove this student?");
			
			if(choice == true) {
				return true;
			}else{return false; }
		}
	</script>
</html>