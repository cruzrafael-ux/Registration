<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Faculty List</title>
</head>
<?php include ('navigation.php'); ?>
</br>

<body>
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
</tr>
<?php foreach ($faculty as $faculty_member) : ?>
<tr>
    <td><?php echo $faculty_member->getId(); ?></td>
    <td><?php echo $faculty_member->getName(); ?></td>
    <td><?php echo $faculty_member->getEmail(); ?></td>
</tr>
<?php endforeach; ?>
</table>
</br>


<h2>Add or Update Faculty</h2>
<form action="faculty.php" method="post">
<label>ID:</label>
<input type="text" name="id"/></br>
<label>Name:</label>
<input type="text" name="name"/></br>
<label>Email:</label>
<input type="text" name="email"/></br>
<input type="hidden" name='action' value='insert_or_update'/>
<input type="radio" name="insert_or_update" value="insert" checked>Add</br>
<input type="radio" name="insert_or_update" value="update">Update</br>
<label>&nbsp;</label>
<input type="submit" value="Submit"/>
</form>
</br>

<h2>Delete Faculty</h2>
<form action="faculty.php" method ="post">
<label>ID:</label>
<input type="text" name="id"/>
<input type="hidden" name='action' value='delete'/>
<label>&nbsp;</label>
<input type="submit" value="Delete Faculty"/>
</form>
</body>
</br>
<?php include ('footer.php'); ?>
</html>