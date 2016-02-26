<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/WHATEVER_CLASS.php";

    $server = 'mysql:host=localhost;dbname=my_inventory_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class WHATEVER_CLASSTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            WHATEVER_CLASS:deleteAll();
        }


    }

?>
