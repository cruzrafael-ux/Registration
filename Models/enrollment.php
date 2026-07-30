<?php

class Enrollment {

    private $id;
    private $student_id;
    private $section_id;
    private $grade;

    public function __construct($id, $student_id, $section_id, $grade = null)
    {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->section_id = $section_id;
        $this->grade = $grade;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
    }

    public function getStudentId()
    {
        return $this->student_id;
    }

    public function setSectionId($section_id)
    {
        $this->section_id = $section_id;
    }

    public function getSectionId()
    {
        return $this->section_id;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    public function getGrade()
    {
        return $this->grade;
    }
}


function list_enrollments() {
    global $database;

    $query = 'SELECT id, student_id, section_id, grade FROM enrollment';

    $statement = $database->prepare($query);

    $statement->execute();

    $enrollments = $statement->fetchAll();

    $statement->closeCursor();

    $enrollment_array = array();

    foreach ($enrollments as $enrollment) {

        $enrollment_array[] = new Enrollment(
            $enrollment['id'],
            $enrollment['student_id'],
            $enrollment['section_id'],
            $enrollment['grade']
        );

    }

    return $enrollment_array;
}


function insert_enrollment($enrollment) {
    global $database;

    $query = "INSERT INTO enrollment 
              (student_id, section_id, grade)
              VALUES (:student_id, :section_id, :grade)";

    $statement = $database->prepare($query);

    $statement->bindValue(":student_id", $enrollment->getStudentId());
    $statement->bindValue(":section_id", $enrollment->getSectionId());
    $statement->bindValue(":grade", $enrollment->getGrade());

    $statement->execute();

    $statement->closeCursor();
}


function update_enrollment($enrollment) {
    global $database;

    $query = "UPDATE enrollment
              SET student_id = :student_id,
                  section_id = :section_id,
                  grade = :grade
              WHERE id = :id";

    $statement = $database->prepare($query);

    $statement->bindValue(":id", $enrollment->getId());
    $statement->bindValue(":student_id", $enrollment->getStudentId());
    $statement->bindValue(":section_id", $enrollment->getSectionId());
    $statement->bindValue(":grade", $enrollment->getGrade());

    $statement->execute();

    $statement->closeCursor();
}


function delete_enrollment($enrollment) {
    global $database;

    $query = "DELETE FROM enrollment
              WHERE id = :id";

    $statement = $database->prepare($query);

    $statement->bindValue(":id", $enrollment->getId());

    $statement->execute();

    $statement->closeCursor();
}

?>