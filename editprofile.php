<?php require('includes/config.php'); 


//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Edit profile Page';

//include header template
 
require('layout/header.php'); 
//--------------------------------------------------------

 function post(){
     $user = new User;                                  
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $age = $_POST['age'];
     $info = $_POST['info'];    
     $user->update( $first_name, $last_name, $age, $info);
            
            }
            



?>


                       <div id ="wrapper">
                          <div id ="header">
                              <div id="logo">       
                              </div>  
                          	  	<div id="menu">
                                  <ul>
                                    <li><a href ='memberpage.php'>Profile</a></li>
                                    <li><a href ='logout.php'>LogOut</a></li
                                  </ul>
                                </div>
                          <div id ="ccontent">                                
                               <h2>Profile Page - Welcome <?php echo $_SESSION['username']; ?></h2>
                                                           
                                                              
                               <div id ="phpform">
                               
                              <form id="edit"  method="post" enctype="multipart/form-data">
                                <img width='100px' height='100px' src='img/pro.jpg'>
                               
                                <p>First Name:<input type="text" name="first_name" ></p>
                                <p>Last Name: <input type="text" name="last_name" ></p>
                                <p>Age: <input type="number" name="age"></p>
                                <p>Bio: <input type="text" name="info" ></p>
                                <button type="submit">Finish editing</button>
                              </form>
                                  
                                </div>
                                  
                            </div>
                          </div>
                       </div>
<?php 
//include header template
require('layout/footer.php'); 
?>
