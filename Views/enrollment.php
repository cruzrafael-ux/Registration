<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Enrollment List</title>
</head>
    <?php include ('navigation.php'); ?>
</br>
<body>
<table>
<tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Section ID</th>
    <th>Grade</th>
</tr>
<?php foreach ($enrollments as $enrollment) : ?>
<tr>
    <td><?php echo $enrollment->getId(); ?></td>
    <td><?php echo $enrollment->getStudentId(); ?></td>
    <td><?php echo $enrollment->getSectionId(); ?></td>
    <td><?php echo $enrollment->getGrade(); ?></td>
</tr>
<?php endforeach; ?>
</table>
</br>

<h2>Add or Update Enrollment</h2>
<form action="enrollment.php" method="post">
<label>ID:</label>
<input type="text" name="id"/></br>
<label>Student ID:</label>
<input type="text" name="student_id"/></br>
<label>Section ID:</label>
<input type="text" name="section_id"/></br>
<label>Grade:</label>
<input type="text" name="grade"/></br>
<input type="hidden" name='action' value='insert_or_update'/>
<input type="radio" name="insert_or_update" value="insert" checked>Add</br>
<input type="radio" name="insert_or_update" value="update">Update</br>
<label>&nbsp;</label>
<input type="submit" value="Submit"/>
</form>
</br>

<h2>Delete Enrollment</h2>
<form action="enrollment.php" method ="post">
<label>ID:</label>
<input type="text" name="id"/>
<input type="hidden" name='action' value='delete'/>
<label>&nbsp;</label>
<input type="submit" value="Delete Enrollment"/>
</form>
</body>
</br>
<?php include ('footer.php'); ?>
</html>