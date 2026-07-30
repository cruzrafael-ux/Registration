<?php

class Student {

    private $id;
    private $name;
    private $major;

    public function __construct($id, $name, $major)
    {
        $this->id = $id;
        $this->name = $name;
        $this->major = $major;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setMajor($major)
    {
        $this->major = $major;
    }

    public function getMajor()
    {
        return $this->major;
    }
}


function list_students() {
    global $database;

    $query = 'SELECT id, name, major FROM students';

    $statement = $database->prepare($query);

    $statement->execute();

    $students = $statement->fetchAll();

    $statement->closeCursor();

    $student_array = array();

    foreach ($students as $student) {

        $student_array[] = new Student(
            $student['id'],
            $student['name'],
            $student['major']
        );

    }

    return $student_array;
}


function insert_student($student) {
    global $database;

    $query = "INSERT INTO students (name, major)
              VALUES (:name, :major)";

    $statement = $database->prepare($query);

    $statement->bindValue(":name", $student->getName());
    $statement->bindValue(":major", $student->getMajor());

    $statement->execute();

    $statement->closeCursor();
}


function update_student($student) {
    global $database;

    $query = "UPDATE students
              SET name = :name,
                  major = :major
              WHERE id = :id";

    $statement = $database->prepare($query);

    $statement->bindValue(":id", $student->getId());
    $statement->bindValue(":name", $student->getName());
    $statement->bindValue(":major", $student->getMajor());

    $statement->execute();

    $statement->closeCursor();
}


function delete_student($student) {
    global $database;

    $query = "DELETE FROM students
              WHERE id = :id";

    $statement = $database->prepare($query);

    $statement->bindValue(":id", $student->getId());

    $statement->execute();

    $statement->closeCursor();
}

?>