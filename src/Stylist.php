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


  }
?>
