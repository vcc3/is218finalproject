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
                                    <li><a href ='memberpage.php'>Profile</a>|</li>
                                    <li><a href ='logout.php'>LogOut</a></li
                                  </ul>
                                </div>
                                <div id ="ccontent">
                              	   <p>
                                   <?php 
                                   $con=mysqli_connect("sql1.njit.edu","vcc3","4aYwK2YO","vcc3");
                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }
                                
                                $result = mysqli_query($con,"SELECT * FROM members");
                                
                                echo "<table border='1'>
                                <tr>
                                <th>Member ID</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Info</th>
                                </tr>";
                                
                                while($row = mysqli_fetch_array($result))
                                {
                                echo "<tr>";
                                echo "<td>" . $row['memberID'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['info'] . "</td>";
                                echo "</tr>";
                                }
                                echo "</table>";
                                
                                mysqli_close($con);
                                   
                                   
                                   ?>
                                   </p>
                                </div>
                        </div>
                       </div>


<?php 
//include header template
require('layout/footer.php'); 
?>
