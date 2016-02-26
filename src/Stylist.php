<?php
class Stylist
{
    private $name;
    private $specialty;
    private $email;
    private $id;

    function __construct($name, $specialty, $email, $id = null)
    {
        $this->name = $name;
        $this->specialty = $specialty;
        $this->email = $email;
        $this->id = $id;
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function getName()
    {
        return $this->name;
    }

    function setSpecialty($new_specialty)
    {
        $this->specialty = (string) $new_specialty;
    }

    function getSpecialty()
    {
        return $this->specialty;
    }

    function setEmail($new_email)
    {
        $this->email = (string) $new_email;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO hair_salon (name, specialty, email) VALUES ('{$this->getName()}', '{$this->getSpecialty()}', '{$this->getEmail()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM hair_salon;");
        $stylists = array();
        foreach($returned_stylists as $stylist) {
            $name = $stylist['name'];
            $specialty = $stylist['specialty'];
            $email = $stylist['email'];
            $id = $stylist['id'];
            $new_stylist = new Restaurant($name, $specialty, $email, $id);
            array_push($stylists, $new_stylist);
        }
        return $stylists;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM hair_salon;");
    }

  }
?>
