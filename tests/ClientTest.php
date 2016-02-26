<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
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
          $test_stylist->save();

          $name = "Bethany";
          $id = null;
          $stylist_id = $test_stylist->getId();
          $test_client = new Client($name, $id, $stylist_id);

          //Act
          $result = $test_client->getName();

          //Assert
          $this->assertEquals("Bethany", $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = null;
            $test_stylist = new Stylist($name, $specialty, $email, $id);
            $test_stylist->save();

            $name = "Bethany";
            $id = 1;
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
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

            $name = "Bethany";
            $id = null;
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            $name2 = "Caroline";
            $id = null;
            $stylist_id = $test_stylist->getId();
            $test_client2 = new Client($name2, $id, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
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

            $name = "Bethany";
            $id = null;
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            $name2 = "Caroline";
            $id = null;
            $stylist_id = $test_stylist->getId();
            $test_client2 = new Client($name2, $id, $stylist_id);
            $test_client2->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
          }

        function testUpdate()
        {
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = null;
            $test_stylist = new Stylist($name, $specialty, $email, $id);
            $test_stylist->save();

            $name = "Bethany";
            $id = null;
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            $new_name = "Beth";

            //Act
            $test_client->updateClientName($new_name);

            //Assert
            $this->assertEquals("Beth", $test_client->getName());
        }

        // function testDelete()
        // {
        //     //Arrange
        //     $name = "Nicolette";
        //     $specialty = "Hair color";
        //     $email = "nicolette@email.com";
        //     $id = null;
        //     $test_stylist = new Stylist($name, $specialty, $email, $id);
        //     $test_stylist->save();
        //
        //     $name = "Bethany";
        //     $stylist_id = $test_stylist->getId();
        //     $test_client = new Client($name, $id, $stylist_id);
        //     $test_client->save();
        //
        //
        //     $name2 = "Caroline";
        //     $stylist_id = $test_stylist->getId();
        //     $test_client2 = new Client($name2, $id, $stylist_id);
        //     $test_client2->save();
        //
        //
        //     //Act
        //     $test_client->deleteClient();
        //
        //
        //     //Assert
        //     $this->assertEquals([$test_client2], Client::getAll());
        // }

        function testFindClient()
        {
            //Arrange
            $name = "Nicolette";
            $specialty = "Hair color";
            $email = "nicolette@email.com";
            $id = null;
            $test_stylist = new Stylist($name, $specialty, $email, $id);
            $test_stylist->save();

            $name = "Bethany";
            $id = null;
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            //Act
            $result = Client::findClient($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }


    }

?>
