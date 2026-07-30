<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
</head>
<?php include ('navigation.php'); ?>
</br>
<body>
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Major</th>
</tr>
<?php foreach ($students as $student) : ?>
<tr>
    <td><?php echo $student->getId(); ?></td>
    <td><?php echo $student->getName(); ?></td>
    <td><?php echo $student->getMajor(); ?></td>
</tr>
<?php endforeach; ?>
</table>
</br>

<h2>Add or Update Student</h2>
<form action="students.php" method="post">
<label>ID:</label>
<input type="text" name="id"/></br>
<label>Name:</label>
<input type="text" name="name"/></br>
<label>Major:</label>
<input type="text" name="major"/></br>
<input type="hidden" name='action' value='insert_or_update'/>
<input type="radio" name="insert_or_update" value="insert" checked>Add</br>
<input type="radio" name="insert_or_update" value="update">Update</br>
<label>&nbsp;</label>
<input type="submit" value="Submit"/>
</form>
</br>

<h2>Delete Student</h2>
<form action="students.php" method ="post">
<label>ID:</label>
<input type="text" name="id"/>
<input type="hidden" name='action' value='delete'/>
<label>&nbsp;</label>
<input type="submit" value="Delete Student"/>
</form>
</body>
</br>
<?php include ('footer.php'); ?>
</html>