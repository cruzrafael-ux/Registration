<?php

class Faculty {

    private $id;
    private $name;
    private $email;

    public function __construct($id, $name, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
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

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}


function list_faculty() {
    global $database;

    $query = 'SELECT id, name, email FROM faculty';

    $statement = $database->prepare($query);

    $statement->execute();

    $faculty = $statement->fetchAll();

    $statement->closeCursor();

    $faculty_array = array();

    foreach ($faculty as $faculty_member) {

        $faculty_array[] = new Faculty(
            $faculty_member['id'],
            $faculty_member['name'],
            $faculty_member['email']
        );

    }

    return $faculty_array;
}


function insert_faculty($faculty) {
    global $database;

    $query = "INSERT INTO faculty (name, email)
              VALUES (:name, :email)";

    $statement = $database->prepare($query);

    $statement->bindValue(":name", $faculty->getName());
    $statement->bindValue(":email", $faculty->getEmail());

    $statement->execute();

    $statement->closeCursor();
}


function update_faculty($faculty) {
    global $database;

    $query = "UPDATE faculty
              SET name = :name,
                  email = :email
              WHERE id = :id";

    $statement = $database->prepare($query);

    $statement->bindValue(":id", $faculty->getId());
    $statement->bindValue(":name", $faculty->getName());
    $statement->bindValue(":email", $faculty->getEmail());

    $statement->execute();

    $statement->closeCursor();
}


function delete_faculty($faculty) {
    global $database;

    $query = "DELETE FROM faculty
              WHERE id = :id";

    $statement = $database->prepare($query);

    $statement->bindValue(":id", $faculty->getId());

    $statement->execute();

    $statement->closeCursor();
}

?>