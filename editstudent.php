<?php include("connection.php"); //$conn ?>
<?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM student WHERE rec_id = '$id'";
    $query = $conn -> query($sql);
    $row = $query -> fetch_assoc();
?>
<html>
    <body>
       
       
        <div align="center">
            <h1>Edit Student</h1>
           
            <form method="post" action="updatestudent.php">
            <table>
                <tr><td>Name: </td><td><input type="text" name="name" value="<?php echo $row['stu_name']; ?>"></td></tr>
                <tr><td>ID: </td><td><input type="text" name="id" value="<?php echo $row['stu_id']; ?>"></td></tr>
                <tr><td>Program: </td><td><select name="program" value="<?php echo['program']; ?>">
                    <option value="CS110">CS110</option>
                    <option value="BM110">BM110</option>
                    <option value="AM110">AM110</option>
                </select></td></tr>
                <tr><td>Gender: </td><td><input type="radio" name="gender" value="male" <?php echo ($row['gender']=='male')?'checked':'' ?>> Male
                <input type="radio" name="gender" value="female" <?php echo ($row['gender']=='female')?'checked':'' ?>> Female</td></tr>
                <tr><td>About: </td><td><textarea name="about"><?php echo $row['about']; ?></textarea></td></tr>
                <tr><td colspan="2" align="right"><input type="submit"></td></tr>
               
                <input type="hidden" name="rec_id" value="<?php echo $id; ?>">
            </table>
            </form>
        </div>
    </body>
</html>