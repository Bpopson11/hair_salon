# _Hair Salon_

#### _Find how many times and where a word is repeated in a sentence/paragraph/string._

#### By _**Brianna Popson**_

## Description

_This app was built with PHP using Silex and Twig templates._

## Setup/Installation Requirements

* _Fork or clone from GitHub_
* _Please create a separate branch if you cloned_
* _Open the folder in a text editor like Atom to view the code_
* _In your terminal for the site to work, use the command "composer update"_
* _To see the page displayed on the front end, within the terminal navigate to the web folder to initialize a local server_
* _Type in the command "php -S localhost:8000" to start the server_
* _Use localhost:8000 in your web browser to view the page_


## Known Bugs

_As of 2/19/16 the stringHighlight method does not work properly on single letter words such as "a", or "I". Instead the method will make every instance of that letter capital. The instance count for those words is correct though._

## Technologies Used

_This app was built in PHP using HTML alongside Silex and Twig._

## MySql code used

mysql> CREATE DATABASE hair_salon;
Query OK, 1 row affected (0.00 sec)

mysql> USE hair_salon;
Database changed

mysql> CREATE TABLE stylists (name VARCHAR (255), specialty VARCHAR (255), email VARCHAR(255), id serial PRIMARY KEY);
Query OK, 0 rows affected (0.09 sec)

mysql> CREATE TABLE clients (name VARCHAR (255), id serial PRIMARY KEY);
Query OK, 0 rows affected (0.09 sec)

mysql> ALTER TABLE clients ADD (stylist_id INT);
Query OK, 0 rows affected (0.12 sec)
Records: 0  Duplicates: 0  Warnings: 0

### License

*MIT License*

Copyright (c) 2016 **_Brianna Popson_**
