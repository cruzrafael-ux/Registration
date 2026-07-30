<?php

include 'Models/database.php';
include 'Models/course.php';

$course = list_courses();

include('views/course.php');
?>