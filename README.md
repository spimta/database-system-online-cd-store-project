# database-system-online-cd-store-project

THE URL of the project: http://www-cs.ccny.cuny.edu/~liny2353/proj2/menu.php
The assignment includes: 

1. Task 1.pdf has the E/R diagram 
2. Task 2.txt has the SQL statement converted from E/R diagram to create the relations.
3. 13 php files: 

* menu.php is basically the menu of the program
* 1.php is a program that can insert a producer. User can input the producers information and click add producer button. Then the program will add a producer into the table Producer.
* 2.php is a program insert a CD supplied by a particular supplier and produced by a particular producer. It will ask user first input CD’s information then click add CD button, it will jump to select_producer.php. After user select producer and supplier in select_producer.php and select_supplier.php, it will add a CD record into the table CD. 
* select_producer.php is a program that allow user to select a currently exits producer in the Producer table or user could also insert a new producer’s information into the table and then select it. Once user select a producer, it will be led to select_supplier.php
* select_supplier.php is a program that allow user to select a currently exits supplier in the Supplier table or user could also insert a new supplier’s information into the table and then select it. Once user select a supplier, it will return to 2.php
* 3.php is a program that insert a regular-customer borrowing a particular CD. The program will ask user first input customer’s information then click the add button, it will lead user to rent1.php. After user return from rent1.php, it will add a new customer into table Customer and a new rent record into table Rent.
* rent1.php is a program that ask user to input the customer’s rental information. The user should first input the CD title, user can either select from the list or type into the text area, then input other’s information and click the rent button. It will lead user back to 3.php
* 4.php is a program that insert a VIP customer that borrowing a particular CD. The program will ask user first input VIP’s information then click the add button, it will lead user to rent2.php. After user return from rent2.php, it will add a new customer into table Customer, a new VIP into table Vip and a new rent record into table Rent.
* rent2.php is a program that ask user to input the VIP’s rental information. The user should first input the CD title, user can either select from the list or type into the text area, then input other’s information and click the rent button. It will lead user back to 4.php
* 5.php is a program that find names and Tel# of all customers who borrowed a particular CD and are supposed to return by a particular date. User can type in the CD name and the date returned by in the text area and then click search button it will leads user to find_customer.php
* find_customer.php will show a list of customers information that borrowed the CD and return by the date that the user wants to search in 5.php
* 6.php is a program that list producers’ information who produce CD of a particular artist released in a particular year. User can type in the artist and year that they want to search and click Search button. The program will lead the user to find_producer.php
* find_prducer.php will show a list of the producers’ information that produced a CDs in a particular year and released a particular artist’s song that user wants to search in 6.php


THE URL: http://www-cs.ccny.cuny.edu/~liny2353/proj2/menu.php

