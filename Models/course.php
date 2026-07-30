<?php

class Course {
    
    private $code;
    private $name;
    private $description;
    private $credits;

    public function __construct($code, $name, $description, $credits = 0)
    {
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->credits = $credits;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setCredits($credits)
    {
        $this->credits = $credits;
    }

    public function getCredits()
    {
        return $this->credits;
    }
}

function list_courses() {
    global $database;
    
    $query = 'SELECT code, name, description, credits FROM courses';
    
    $statement = $database->prepare($query);
    
    $statement->execute();
    
    // risky if you have HUGE amounts of data
    $courses = $statement->fetchAll();
    
    $statement->closeCursor();
    
    $courses_array = array();
    
    foreach ($courses as $course) {
        $courses_array[] = new Course($course['code'], $course['name'],
                 $course['description'], $course['credits']);
    }
    
    return $courses_array;
}

function insert_course($course) {
    global $database;
    
    // Practice not plug values into Query by using Substitutions
    $query = "INSERT INTO course (code, name, description, credits) "
            . "VALUES (:code, :name, :description, :credits)";
    
    // Value binding in PDO protects against sql injection (Care)
    $statement = $database->prepare($query);
    $statement->bindValue(":code", $course->getCode());
    $statement->bindValue(":name", $course->getName());
    $statement->bindValue(":description", $course->getDescription());
    $statement->bindValue(":credits", $course->getCredits());
    
    $statement->execute();
    
    $statement->closeCursor();
}

function update_course($course) {
    global $database;
    
    $query = "update course set code = :code, name = :name, description = :description,"
            . " credits = :credits";
    
    $statement = $database->prepare($query);
    $statement->bindValue(":code", $course->getCode());
    $statement->bindValue(":name", $course->getName());
    $statement->bindValue(":description", $course->getDescription());
    $statement->bindValue(":credits", $course->getCredits()); 
    
    $statement->execute();
    
    $statement->closeCursor();
}

function delete_course($course) {
    global $database;
    
    // Practice not plug values into Query by using Substitutions
    $query = "delete from course "
            . " where code = :code";
    
    $statement = $database->prepare($query);
    $statement->bindValue(":code", $course->getCode());
    
    $statement->execute();
    
    $statement->closeCursor();
}

?>

