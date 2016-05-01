<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
include('AddBookDB.php');
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>Change password</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <script type="text/javascript" src="AddBookJS.js"></script>
        <style type="text/css"></style>
	</head>   
    <body> 
        <div id="wrapper">
        <div id="content">     
        <?php
        if ($connect){
            if ($_SESSION["timeout"] < time()){
                            // time out
                            unset($_SESSION['userid']);
                            unset($_SESSION['timeout']);
                        }
             if(!$_SESSION["userid"]){
                $url = "AddBookInd.php";
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";   
                }
            else{    
            // Check current password
                $id=$_SESSION["userid"];
                $sql = "SELECT * FROM Account WHERE id= '".$id. "'" ;  
                if($sql){
                    $result = mysql_query($sql,$connect);
                    $row = mysql_fetch_array($result);
                    $psw=SHA1($_POST["password"]);
                    if ($psw===$row['password'] ) {
                        include('AddBookHeader.php');
                        $npsw=SHA1($_POST["newpassword"]);
                        $sqlp = "UPDATE Account SET password=$npsw WHERE id='".$id."'";
                        echo'<div id="white"><br><br><br><P id="black" class="ind">Password changed successfully!</P>
                            <a href="AddBookAcc.php">
                            <input type="button" name="submit" value="Back to My Profile!" font style="cursor:pointer; width:30%; height: 40px;margin:0% 0% 0% 35%; background: rgba(0%,0%,0%,0.8); color:#FFFFFF">
                        </div>';
                        } 
                    else {
                        include('AddBookHeader.php');
                        echo '<div id="white"><p class="ind">Sorry! current password you entered is wrong! </p>' .mysql_error($connect);
                        echo' 
                            <a href="AddBookCP.php">
                            <input type="button" name="submit" value="Enter your current password again!" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"font style="cursor:pointer; width:30%; height: 40px;margin:0% 0% 0% 35%; background: rgba(0%,0%,0%,0.8); color:#FFFFFF">
                            </a>
                            </div>';
                        
                    }
                }    
            }    
        }
        mysql_close($connect);  
        ?>
        </div><!-- #content -->
        <div id="footer">
            <a href="mailto:contact@myaddbook.com?Subject=Hello" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="text-decoration:none; color:#FFFFFF;" target="_top"> 
            <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookAbout.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookLoc.php"  onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
            <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="20" width="15%" ></a></p>
        </div><!-- #footer -->
        </div><!-- #wrapper -->
    </body>
</html>
