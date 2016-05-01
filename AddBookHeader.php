<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
	<title>Header</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css" />
    <script type="text/javascript" src="AddBookJS.js"></script>
    <style type="text/css"></style>
	</head>
    <body>	
        <header>
            <h1 id="h1"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="60" width="35%" ></a></h1> 
        <?php
            include('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookDB.php');    
            
            if ($_SESSION["timeout"] < time()){
                // time out
                unset($_SESSION['userid']);
                unset($_SESSION['facebook']);
                unset($_SESSION['timeout']);
            }
            if(!$_SESSION["userid"]){
                $url = "AddBookInd.php";
                echo "<script type='text/javascript'>";
                echo "</script>";   
            }
            else{    
                echo '
                    <nav class="nav">            
                        <ul>
                            <li>                                      
                                <a href="AddBookLogout.php"  onclick="return confirm(\'Are you sure you want to \"Log Out?\"\')> 
                                    <span>
                                    </span>
                                </a> 
                            </li>';   
                echo'
                            <li>
                                <a href="AddBookAdd.php"> 
                                    <span>  
                                    </span>
                                </a> 
                            </li>
                            ';
                echo'
                            <li>
                                <a href="AddBookAcc.php"> 
                                    <span>
                                    </span>
                                </a> 
                            </li>';
                 echo'
                            <li>
                                <a href="AddBookLogin.php"> 
                                    <span>
                                    </span>
                                </a>
                            </li>';
                echo'
                            <li>
                                <a href="AddBookGB.php"> 
                                    <span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                ';
                                         
                echo'<p id="wel">Hi!&nbsp;'; 
                echo($_SESSION['facebook'])?$_SESSION['facebook']['name']:$_SESSION["username"];
                echo'You are No.'.$_SESSION["userid"].' user</p>'; 
                echo'
                <p id="wel"><button onmouseover="overStyle(this)" onmouseout="outStyle(this)" onclick="ShowMeDate()" style="font-size: 20%; width:30%; height: 30px; background: rgba(0%,0%,0%,0.8); color:#B2DFEE; cursor:pointer;">Date</button></p></div>';                       
            }  
        ?>
       </header>
    </body>
</html>	