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
          $name = "Bethany";
          $id = null;
          $test_client = new Client($name, $id);

          //Act
          $result = $test_client->getName();

          //Assert
          $this->assertEquals("Bethany", $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Bethany";
            $id = 1;
            $test_client = new Client($name, $id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getAll()
        {
            //Arrange
            $name = "Bethany";
            $id = null;
            $test_client = new Client($name, $id);
            $test_client->save();

            $name2 = "Caroline";
            $id = null;
            $test_client2 = new Client($name2, $id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
          }

        function test_delteAll()
        {
            //Arrange
            $name = "Bethany";
            $id = null;
            $test_client = new Client($name, $id);
            $test_client->save();

            $name2 = "Caroline";
            $id = null;
            $test_client2 = new Client($name2, $id);
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
            $name = "Bethany";
            $id = null;
            $test_client = new Client($name, $id);
            $test_client->save();

            $new_name = "Beth";

            //Act
            $test_client->updateClientName($new_name);

            //Assert
            $this->assertEquals("Beth", $test_client->getName());
        }

        function testDelete()
        {
            //Arrange
            $name = "Bethany";
            $id = null;
            $test_client = new Client($name, $id);
            $test_client->save();

            $name2 = "Caroline";
            $id = null;
            $test_client2 = new Client($name2, $id);
            $test_client2->save();

            //Act
            $test_client->deleteClient();

            //Assert
            $this->assertEquals([$test_client2], Client::getAll());
        }
        
        function testFindClient()
        {
            //Arrange
            $name = "Bethany";
            $id = null;
            $test_client = new Client($name, $id);
            $test_client->save();

            //Act
            $result = Client::findClient($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }


    }

?>
