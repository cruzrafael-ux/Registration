<?php

require_once 'Models/database.php';
require_once 'Models/students.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));

$id = filter_input(INPUT_POST, "id");
$name = htmlspecialchars(filter_input(INPUT_POST, "name"));
$major = htmlspecialchars(filter_input(INPUT_POST, "major"));


if ($action == "insert_or_update" && $name != "" && $major != "") {

    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');
    
    $student = new Student($id, $name, $major);
    
    if ($insert_or_update == "insert") {
        insert_student($student);
    } 
    else if ($insert_or_update == "update") {
        update_student($student);
    }
    
    header("Location: students.php");

} else if ($action == "delete" && $id != "") {

    $student = new Student($id, "", "");

    delete_student($student);

    header("Location: students.php");

} else if ($action != "") {

    $error_message = "Missing name or major";

}


$students = list_students();

include('views/students.php');

?>