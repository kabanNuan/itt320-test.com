<?php

	include("connection.php");
	
	if(!empty($_POST['search'])) {
		$sql = "SELECT * FROM student JOIN parent USING (stu_id) WHERE stu_id = '".$_POST['search']."'|| program ='".$_POST['search2']."'";
		$query = $conn -> query($sql);
		$row = $query -> fetch_assoc();
	}else{
		$sql = "SELECT * FROM student JOIN 	parent USING (stu_id)";
		$query = $conn -> query($sql);
		$row = $query -> fetch_assoc();
	}
?>

<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
	<body>
		<?php include("navbar.php");?>
		<div align = "center">
			<table border="1">
			<tr>
				<th>Name</th>
				<th>ID</th>
				<th>Program</th>
				<th>Gender</th>
				<th>Father</th>
				<th>Mother</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row['stu_name']; ?></a></td>
				<td><?php echo $row['stu_id']; ?></td>
				<td><?php echo $row['program']; ?></td>
				<td><?php echo $row['gender']; ?></td>
			</tr>
			<?php } while($row = $query -> fetch_assoc()) ?>
			</table>
		</div>
	
	</body>
</html>