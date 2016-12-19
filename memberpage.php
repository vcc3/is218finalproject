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
                               <h2>Welcome to the Editting Profile Page - Welcome <?php echo $_SESSION['username']; ?></h2>
                                  <?php 
                                   $con=mysqli_connect("sql1.njit.edu","vcc3","4aYwK2YO","vcc3");
                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }
                                $user = $_SESSION['username'];
                                $result = mysqli_query($con,"SELECT * FROM members WHERE username ='$user'");
                                
                               
                                                               
                                while($row = mysqli_fetch_array($result))
                                {
                                echo "<img width='100px' height='100px' src=".$row['profilepic'].">";                               						                	
                                echo "<p> Users memberID :" . $row['memberID'] . "</p>";
                                echo "<p>Username is :" . $row['username'] . "</p>";
                                echo "<p>Users email is :" . $row['email']    . "</p>";
								                echo "<p>Bio:" . $row['info']     . "</p>";
                              
                                }
                            
                                
                                mysqli_close($con);
                                   
                                   
                                   ?>
   
                             </div>
                          </div>
                       </div>
<?php 
//include header template
require('layout/footer.php'); 
?>
