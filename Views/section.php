<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Section List</title>
</head>
<?php include ('navigation.php'); ?>
</br>
<body>
<table>
<tr>
    <th>ID</th>
    <th>Course Code</th>
    <th>Faculty ID</th>
    <th>Semester</th>
</tr>
<?php foreach ($sections as $section) : ?>
<tr>
    <td><?php echo $section->getId(); ?></td>
    <td><?php echo $section->getCourseCode(); ?></td>
    <td><?php echo $section->getFacultyId(); ?></td>
    <td><?php echo $section->getSemester(); ?></td>
</tr>
<?php endforeach; ?>
</table>
</br>

<h2>Add or Update Section</h2>
<form action="section.php" method="post">
<label>ID:</label>
<input type="text" name="id"/></br>
<label>Course Code:</label>
<input type="text" name="course_code"/></br>
<label>Faculty ID:</label>
<input type="text" name="faculty_id"/></br>
<label>Semester:</label>
<input type="text" name="semester"/></br>
<input type="hidden" name='action' value='insert_or_update'/>
<input type="radio" name="insert_or_update" value="insert" checked>Add</br>
<input type="radio" name="insert_or_update" value="update">Update</br>
<label>&nbsp;</label>
<input type="submit" value="Submit"/>
</form>
</br>

<h2>Delete Section</h2>
<form action="section.php" method ="post">
<label>ID:</label>
<input type="text" name="id"/>
<input type="hidden" name='action' value='delete'/>
<label>&nbsp;</label>
<input type="submit" value="Delete Section"/>
</form>
</body>
</br>
<?php include ('footer.php'); ?>
</html>