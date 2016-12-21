<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($dbs){
    	parent::__construct();

    	$this->_db = $dbs;
    }

	private function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT password, username, memberID FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
    public function get_user_info($username){
		  try {
        //Get database
        $dbs = dbConn::getConnection();
			  $stmt = $dbs->prepare('SELECT first_name, last_name, memberID,  info, email FROM members WHERE username = :username AND active="Yes" ');
        $stmt->execute(array('username' => $username));
		  	return $stmt->fetch();
		  } catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		  }
	  }
       public function update($first_name, $last_name, $age, $info) {
    try {
      //Get database
      $dbs = dbConn::getConnection();
      //insert into database with a prepared statement
      $user = $_SESSION['username'];
      $stmt = $dbs->prepare("UPDATE members SET first_name=:first, last_name=:last,  age=:age, info=:info,  WHERE username='$user'");
      $stmt->execute(array(
        ':first' => $first_name,
        ':last' => $last_name,
        ':age' => $age,
        ':info' => $info      
      ));
      
      //redirect to index page
      header('Location: memberpage.php');
      exit;
  } catch(PDOException $e) {
      echo '<script>console.log("'.$e->getMessage().'");</script>';
      $error[] = $e->getMessage();
  }

}


	public function login($username,$password){

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['memberID'] = $row['memberID'];
		    return true;
		}
	}


	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
