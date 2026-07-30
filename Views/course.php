<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Course List</title>
</head>
    <?php include ('navigation.php'); ?>
</br>
<body>
    <table> 
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Credits</th>
        </tr>
        <?php foreach ($courses as $course) : ?>
        <tr>
            <td><?php echo $course->getCode(); ?></td>
            <td><?php echo $course->getName(); ?></td>
            <td><?php echo $course->getDescription(); ?></td>
            <td><?php echo $course->getCredits(); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </br>
    <h2>Add or Update Course</h2>
    <form action="course.php" method="post">
        <label>Code:</label>
        <input type="text" name="code"/></br>
        <label>Name:</label>
        <input type="text" name="name"/></br>
        <label>Description:</label>
        <input type="text" name="description"/></br>
        <label>Credits:</label>
        <input type="text" name="credits"/></br>
        <input type="hidden" name='action' value='insert_or_update'/>
        <input type="radio" name="insert_or_update" value="insert" checked>Add</br>
        <input type="radio" name="insert_or_update" value="update">Update</br>
        <label>&nbsp;</label>
        <input type="submit" value="Submit"/>
    </form>
    </br>
    <h2>Delete Course</h2>
    <form action="course.php" method ="post">
        <?php include("courseCodeDropDown.php"); ?>
        <input type="hidden" name='action' value='delete'/>
        <label>&nbsp;</label>
        <input type="submit" value="Delete Stock"/>
    </form>
</body>
</br>
<?php include ('footer.php'); ?>
</html>