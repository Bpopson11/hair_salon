# _PDXpress Salon_

#### _Database for a Hair Salon._

#### By _**Brianna Popson**_

## Description

_This app was built with PHP using Silex and Twig templates. The database used was created via mySql. This app allows a hypothetical stylist add their basic information to a database, as well as their clients' names. The stylist can be edited and deleted individually._

## Setup/Installation Requirements

* _Fork or clone from GitHub_
* _Please create a separate branch if you cloned_
* _Open the folder in a text editor like Atom to view the code_
* _In your terminal for the site to work, use the command "composer update"_
* _To see the page displayed on the front end, within the terminal navigate to the web folder to initialize a local server_
* _Type in the command "php -S localhost:8000" to start the server_
* _Use localhost:8000 in your web browser to view the page_


## Known Bugs

_There is presently (as of 2/26/16) not a functioning option to delete individual clients._

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
