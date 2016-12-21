<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'test ';

//include header template
require('layout/header.php'); 
?>
  <div id ="wrapper">
                          <div id ="header">
                              <div id="logo">       
                              </div>  
                          	  	<div id="menu">
                                  <ul>
                                    <li><a href ='lihomepage.php'>Home</a>|</li>                                   
                                    <li><a href ='#'>About</a>|</li>
                                    <li><a href ='#'>News</a>|</li>
                                    <li><a href ='memberpage.php'>Profile</a></li>
                                    <li><a href ='logout.php'>LogOut</a></li
                                  </ul>
                                </div>
                                <div id ="ccontent">
                              	   <p>
                                   <?php 
                                  //Get database
                              $dbs = dbConn::getConnection();
                              print_r($dbs);
                              //insert into database with a prepared statement
                              $stmt = $dbs->query('SELECT memberID, username, email FROM members ');
                             
 		  	                      $array = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                              function build_table($info){
                                  // builds table
                                  $html = '<table>';
                                  // top rop of table.
                                  $html .= '<tr>';
                                      foreach($info[0] as $key=>$value){
                                          $html .= '<th>  <hr>' . $key . '   </th>';
                                          //takes member id, username and email from database
                                      }
                                  $html .= '</tr>';
                                  // start the body of the table.
                                  $hmtl .= '<tbody>';
                                  // rows with information
                                  foreach( $info as $key=>$value){
                                      $html .= '<tr>';
                                      foreach($value as $key2=>$value2){
                                          $html .= '<td>' . $value2 . '</td>';
                                      }
                                      $html .= '</tr>';
                                  }
                              
                                    $hmtl .= '</tbody>';
                                  // closes table
                                  $html .= '</table>';
                                  return $html;
                              }
                              
                              
                              echo build_table($array);                                                                                    
                              
                             
                                   
                                   ?>
                                   </p>
                                </div>
                        </div>
                       </div>


<?php 
//include header template
require('layout/footer.php'); 
?>
