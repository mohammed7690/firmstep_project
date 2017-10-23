# firmstep_project
A developer test for firmstep. 

## Installation & Setup
This application has been tested using xampp. if you have xampp this should work perfectly.  
To run this application you'll need to do some work (Don't worry, I made it easier for you).    
Download this project in ZIP. and Extract it using 'WinRAR' by selecting 'Extract Here' option. if you don't have WinRAR, just double click the zip file and copy all the inner files and paste it inside a file with the same name as the zip file, without the zip extension.  
So the file path is something similar to this:  
'C:/xampp/htdocs/firmstep_project-master/'  

In phpmyadmin page, i have left all the settings in default. so the user is 'root', host is 'localhost', and password is empty ''.    

To create a database, run the following SQL script in phpmyadmin page:  
```
CREATE DATABASE firmstep_db;
```
After creating the database - go inside the database **(very important!)** by clicking the database name and run the following script after clicking on the sql tab: 
```
CREATE TABLE firmstep_customer(  
    id int(11) NOT NULL AUTO_INCREMENT,  
    type varchar(255) NOT NULL,  
    name varchar(255) NOT NULL,  
    service varchar(255) NOT NULL,  
    queued_at varchar(255) NOT NULL,  
    PRIMARY KEY (id)  
);    
```
Now create the service table:  
```
CREATE TABLE firmstep_services(  
    id int(11) NOT NULL AUTO_INCREMENT,  
    service varchar(255) NOT NULL,  
    PRIMARY KEY (id)  
);    
```
Now populate the table with the service data:  
```
INSERT INTO firmstep_services
    (service)
VALUES
    ('Housing'),
    ('Benefits'),
    ('Council Tax'),
    ('Fly-tipping'),
    ('Missed Bin');
```
Now you are ready to run the application :)    

## chosen framework / solution
I have used:  
PHP - To perform all the serverside tasks  
javascript mainly the jQuery library - To deal with the frontend functionality.  
Bootstrap - For responsiveness, built-in elements and loads of CSS helpful classes.  
Attempted the MVC approach - To separate out the codes and to make it easily manageable.  
Database usage - to store and retrieve data.    

## For further Improvement
This Application can be improved by adding the delete and update functionalities. Due to limited time (Had few hours to work on this) I couldn't add those functionalities.  
Dealing with security (SQL injection), and more form on form validation.  

## Warnings
Some deprecated codes in place. main ones are ' mysql_connect():' and ' mysql_real_escape_string():' will update them shortly.   
