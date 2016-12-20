<?php

  class dbConn{
    protected static $db;
    private function __construct(){
    ob_start();
    session_start();
    //application address
    define('DIR','https://web.njit.edu/~vcc3/is218pro1/final1/');
    define('SITEEMAIL','vcc3@njit.edu');
    try {
	  //create PDO connection
      self::$db= new PDO('mysql:host=sql1.njit.edu;dbname=vcc3', 'vcc3', '4aYwK2YO' );	
  	  self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
	  //show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
    }
    }
    public static function getConnection() {
      
      //Guarantees single instance, if no connection object exists then create one.
      if (!self::$db) {
      //new connection object.
      new dbConn();
      }
       
       //return connection.
       return self::$db;
       }
       }

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$dbs = dbConn::getConnection();
$user = new User($dbs);
?>

