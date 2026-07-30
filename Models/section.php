<?php

class Section {

    private $id;
    private $course_code;
    private $faculty_id;
    private $semester;

    public function __construct($id, $course_code, $faculty_id, $semester)
    {
        $this->id = $id;
        $this->course_code = $course_code;
        $this->faculty_id = $faculty_id;
        $this->semester = $semester;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCourseCode($course_code)
    {
        $this->course_code = $course_code;
    }

    public function getCourseCode()
    {
        return $this->course_code;
    }

    public function setFacultyId($faculty_id)
    {
        $this->faculty_id = $faculty_id;
    }

    public function getFacultyId()
    {
        return $this->faculty_id;
    }

    public function setSemester($semester)
    {
        $this->semester = $semester;
    }

    public function getSemester()
    {
        return $this->semester;
    }
}


function list_sections() {
    global $database;

    $query = 'SELECT id, course_code, faculty_id, semester FROM section';

    $statement = $database->prepare($query);

    $statement->execute();

    $sections = $statement->fetchAll();

    $statement->closeCursor();

    $section_array = array();

    foreach ($sections as $section) {

        $section_array[] = new Section(
            $section['id'],
            $section['course_code'],
            $section['faculty_id'],
            $section['semester']
        );

    }

    return $section_array;
}


function insert_section($section) {
    global $database;

    $query = "INSERT INTO section 
              (course_code, faculty_id, semester)
              VALUES (:course_code, :faculty_id, :semester)";

    $statement = $database->prepare($query);

    $statement->bindValue(":course_code", $section->getCourseCode());
    $statement->bindValue(":faculty_id", $section->getFacultyId());
    $statement->bindValue(":semester", $section->getSemester());

    $statement->execute();

    $statement->closeCursor();
}


function update_section($section) {
    global $database;

    $query = "UPDATE section
              SET course_code = :course_code,
                  faculty_id = :faculty_id,
                  semester = :semester
              WHERE id = :id";

    $statement = $database->prepare($query);

    $statement->bindValue(":id", $section->getId());
    $statement->bindValue(":course_code", $section->getCourseCode());
    $statement->bindValue(":faculty_id", $section->getFacultyId());
    $statement->bindValue(":semester", $section->getSemester());

    $statement->execute();

    $statement->closeCursor();
}


function delete_section($section) {
    global $database;

    $query = "DELETE FROM section
              WHERE id = :id";

    $statement = $database->prepare($query);

    $statement->bindValue(":id", $section->getId());

    $statement->execute();

    $statement->closeCursor();
}

?>