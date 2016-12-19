<?php
ob_start();
session_start();

//database credentials
define('DBHOST','sql1.njit.edu');
define('DBUSER','vcc3');
define('DBPASS','4aYwK2YO');
define('DBNAME','vcc3');
//application address
define('DIR','https://web.njit.edu/~vcc3/is218pro1/final1/');
define('SITEEMAIL','vcc3@njit.edu');
try {
	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}
//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>