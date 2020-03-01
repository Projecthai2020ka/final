<?php
class CreateDb
{
    public $servername,$username,$password,$dbname,$con,$tablequery;    //variables

    //contructor intializing the batabase features
    public function __construct()
    {
	$this->servername="localhost";
 	$this->username="root";
    $this->password="";
    $this->dbname="AKA";
    }
	
    public function createthebeast($tablequery)
    {
        $this->tablequery=$tablequery;
        //creating connection
	    $this->con = mysqli_connect($this->servername,$this->username,$this->password);
        //checking
        if(!$this->con) //if false, then show error msg. else we r good to go
        {
               die("connection failed".mysqli_connect_error());
        }
	
        //query to create new db
        $sql="CREATE DATABASE IF NOT EXISTS $this->dbname";  

       
        if(mysqli_query($this->con,$sql))    //execute query $sql
        {

            $this->con=mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);//connecting to database

            //sql to create new table
  
            if(!mysqli_query($this->con,$this->tablequery))
            {
                echo "table nahi bana bhai".mysqli_error($this->con);
            }
            else
	        {
                echo "Ban Gaya Bhai !!" ;
            }
        }
     }
  }//end of class



  //the above is a class of which we are creating a object and the then calling functions to create three tables
  $obj=new CreateDb();
  $querie="CREATE TABLE Products(id INT(11) AUTO_INCREMENT PRIMARY KEY,product_name VARCHAR(25),product_price INT(10),product_image VARCHAR(100))";
  $obj->createthebeast($querie);
  $querie="CREATE TABLE Registered_users(Email varchar(20) primary key,Username varchar(10),password int(10))";
  $obj->createthebeast($querie);
  $querie="CREATE TABLE Active_Session(Email varchar(20) primary key references Registered_users(EmaiL) ,Username varchar(10) references Registered_users(Username))";
  $obj->createthebeast($querie);


?>