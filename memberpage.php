<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
?>


                       <div id ="wrapper">
                          <div id ="header">
                              <div id="logo">       
                              </div>  
                          	  	<div id="menu">
                                  <ul>
                                    <li><a href ='table.php'>Table of Users</a>|</li>
                                    <li><a href ='editprofile.php'>Edit Profile</a>|</li>
                                    <li><a href ='logout.php'>LogOut</a></li
                                  </ul>
                                </div>
                                <div id ="ccontent">
                              	  <h2>Profile page - Welcome <?php echo $_SESSION['username']; ?></h2>		
                                  <p> testing testing testing</p>
                                  
                                </div>
                        </div>
                       </div>
<?php 
//include header template
require('layout/footer.php'); 
?>
