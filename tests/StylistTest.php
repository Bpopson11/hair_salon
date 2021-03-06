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
            Client::deleteAll();
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

        function test_getEmail()
        {
          //Arrange
          $name = "Nicolette";
          $specialty = "Hair color";
          $email = "nicolette@email.com";
          $id = null;
          $test_stylist = new Stylist($name, $specialty, $email, $id);

          //Act
          $result = $test_stylist->getEmail();

          //Assert
          $this->assertEquals("nicolette@email.com", $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = 1;
            $test_stylist = new Stylist($name, $specialty, $email, $id);

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getClient()
        {
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = null;
            $test_stylist = new Stylist($name, $specialty, $email, $id);
            $test_stylist->save();

            $test_stylist_id = $test_stylist->getId();

            $name = "Bethany";
            $test_client = new Client($name, $id, $test_stylist_id);
            $test_client->save();

            $name2 = "Caroline";
            $test_client2 = new Client($name2, $id, $test_stylist_id);
            $test_client2->save();

            //Act
            $result = $test_stylist->getClients();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
          }

        function test_getAll()
        {
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = null;
            $test_stylist = new Stylist($name, $specialty, $email, $id);
            $test_stylist->save();

            $name2 = "Jamie";
            $specialty2 = "Curly hair";
            $email2 = "jamie2@email.com";
            $id = null;
            $test_stylist2 = new Stylist($name2, $specialty2, $email2, $id);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
          }

        function test_delteAll()
        {
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = null;
            $test_stylist = new Stylist($name, $specialty, $email, $id);
            $test_stylist->save();

            $name2 = "Jamie";
            $specialty2 = "Curly hair";
            $email2 = "jamie2@email.com";
            $id = null;
            $test_stylist2 = new Stylist($name2, $specialty2, $email2, $id);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
          }

        function testUpdate()
        { //this test wasn run on Stylist name, specialty, and e-mail and all passed. For the sake of brevity only one test is shown.
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = null;
            $test_stylist = new Stylist($name, $specialty, $email, $id);
            $test_stylist->save();

            $new_name = "Nicole";

            //Act
            $test_stylist->updateSytlistName($new_name);

            //Assert
            $this->assertEquals("Nicole", $test_stylist->getName());
        }

        function testDelete()
        {
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = null;
            $test_stylist = new Stylist($name, $specialty, $email, $id);
            $test_stylist->save();

            $name2 = "Jamie";
            $specialty2 = "Curly hair";
            $email2 = "jamie2@email.com";
            $id = null;
            $test_stylist2 = new Stylist($name2, $specialty2, $email2, $id);
            $test_stylist2->save();

            //Act
            $test_stylist->deleteStylist();

            //Assert
            $this->assertEquals([$test_stylist2], Stylist::getAll());
        }

        function testFindStylist()
        {
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = null;
            $test_stylist = new Stylist($name, $specialty, $email, $id);
            $test_stylist->save();

            //Act
            $result = Stylist::findStylist($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }


    }

?>
