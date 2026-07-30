<?php

require_once 'Models/database.php';
require_once 'Models/enrollment.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));

$id = filter_input(INPUT_POST, "id");
$student_id = filter_input(INPUT_POST, "student_id");
$section_id = filter_input(INPUT_POST, "section_id");
$grade = htmlspecialchars(filter_input(INPUT_POST, "grade"));


if ($action == "insert_or_update" 
        && $student_id != "" 
        && $section_id != "") {

    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');
    
    $enrollment = new Enrollment(
        $id, 
        $student_id, 
        $section_id, 
        $grade
    );
    
    if ($insert_or_update == "insert") {
        insert_enrollment($enrollment);
    } 
    else if ($insert_or_update == "update") {
        update_enrollment($enrollment);
    }
    
    header("Location: enrollment.php");

} else if ($action == "delete" && $id != "") {

    $enrollment = new Enrollment($id, "", "", "");

    delete_enrollment($enrollment);

    header("Location: enrollment.php");

} else if ($action != "") {

    $error_message = "Missing student id or section id";

}


$enrollments = list_enrollments();

include('views/enrollment.php');

?>