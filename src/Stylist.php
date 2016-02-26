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
        $GLOBALS['DB']->exec("INSERT INTO stylists (name, specialty, email) VALUES ('{$this->getName()}', '{$this->getSpecialty()}', '{$this->getEmail()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
        $stylists = array();
        foreach($returned_stylists as $stylist) {
            $name = $stylist['name'];
            $specialty = $stylist['specialty'];
            $email = $stylist['email'];
            $id = $stylist['id'];
            $new_stylist = new Stylist($name, $specialty, $email, $id);
            array_push($stylists, $new_stylist);
        }
        return $stylists;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM stylists;");
    }

    function deleteStylist()
    {
        $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
        $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
    }

    function updateSytlistName($new_name)
    {
        $GLOBALS['DB']->exec("UPDATE stylists SET name = '{$new_name}' WHERE id = {$this->getId()};");
        $this->setName($new_name);
    }

    function updateSytlistSpecialty($new_specialty)
    {
        $GLOBALS['DB']->exec("UPDATE stylists SET specialty = '{$new_specialty}' WHERE id = {$this->getId()};");
        $this->setSpecialty($new_specialty);
    }

    function updateSytlistEmail($new_email)
    {
        $GLOBALS['DB']->exec("UPDATE stylists SET email = '{$new_email}' WHERE id = {$this->getId()};");
        $this->setEmail($new_email);
    }

    static function findStylist($search_id)
    {
        $found_stylist = null;
        $stylists = Stylist::getAll();
        foreach($stylists as $stylist) {
            $stylist_id = $stylist->getId();
            if ($stylist_id == $search_id) {
              $found_stylist = $stylist;
            }
        }
        return $found_stylist;
    }

    function getClients()
    {
        $clients = array();
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()}");
        foreach($returned_clients as $client) {
            $name = $client['name'];
            $id = $client['id'];
            $stylist_id = $client['stylist_id'];
            $new_client = new Client($name, $id, $stylist_id);
            array_push($clients, $new_client);
        }
        return $clients;
    }
  }
?>
