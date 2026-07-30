<?php

require_once 'Models/database.php';
require_once 'Models/faculty.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));

$id = filter_input(INPUT_POST, "id");
$name = htmlspecialchars(filter_input(INPUT_POST, "name"));
$email = htmlspecialchars(filter_input(INPUT_POST, "email"));


if ($action == "insert_or_update" && $name != "" && $email != "") {

    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');
    
    $faculty = new Faculty($id, $name, $email);
    
    if ($insert_or_update == "insert") {
        insert_faculty($faculty);
    } 
    else if ($insert_or_update == "update") {
        update_faculty($faculty);
    }
    
    header("Location: faculty.php");

} else if ($action == "delete" && $id != "") {

    $faculty = new Faculty($id, "", "");

    delete_faculty($faculty);

    header("Location: faculty.php");

} else if ($action != "") {

    $error_message = "Missing name or email";

}


$faculty = list_faculty();

include('views/faculty.php');

?>