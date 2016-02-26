<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class StylistTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_getName()
        {
          //Arrange
          $name = "Nicolette";
          $specialty = "Hair color";
          $email = "nicolette@email.com";
          $id = null;
          $test_stylist = new Stylist($name, $specialty, $email, $id);

          //Act
          $result = $test_stylist->getName();

          //Assert
          $this->assertEquals("Nicolette", $result);
        }

        function test_getSpecialty()
        {
          //Arrange
          $name = "Nicolette";
          $specialty = "Hair color";
          $email = "nicolette@email.com";
          $id = null;
          $test_stylist = new Stylist($name, $specialty, $email, $id);

          //Act
          $result = $test_stylist->getSpecialty();

          //Assert
          $this->assertEquals("Hair color", $result);
        }

    }

?>
