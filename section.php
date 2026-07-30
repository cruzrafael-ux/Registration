<?php

require_once 'Models/database.php';
require_once 'Models/section.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));

$id = filter_input(INPUT_POST, "id");
$course_code = htmlspecialchars(filter_input(INPUT_POST, "course_code"));
$faculty_id = filter_input(INPUT_POST, "faculty_id");
$semester = htmlspecialchars(filter_input(INPUT_POST, "semester"));


if ($action == "insert_or_update" 
        && $course_code != "" 
        && $faculty_id != "" 
        && $semester != "") {

    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');
    
    $section = new Section(
        $id,
        $course_code,
        $faculty_id,
        $semester
    );
    
    if ($insert_or_update == "insert") {
        insert_section($section);
    } 
    else if ($insert_or_update == "update") {
        update_section($section);
    }
    
    header("Location: section.php");

} else if ($action == "delete" && $id != "") {

    $section = new Section($id, "", "", "");

    delete_section($section);

    header("Location: section.php");

} else if ($action != "") {

    $error_message = "Missing course code, faculty id, or semester";

}


$sections = list_sections();

include('views/section.php');

?>