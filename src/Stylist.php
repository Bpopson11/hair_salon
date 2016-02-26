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


  }
?>
