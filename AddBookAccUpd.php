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
        <title>Edit My Profile</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <style type="text/css"></style>
	</head>   
    <body> 
        <div id="wrapper">            
        <div id="content">   
        <?php
        include('AddBookHeader.php');

        // Update data to table MyAddBook
        $sql = "UPDATE Account SET Name='".$_POST['name']."',Email='".$_POST['email']."' WHERE id= '".$_SESSION['userid']. "'" ;
            
        if (mysql_query($sql,$connect) === TRUE) {
            echo '<div id="white"><br><br><br><P id="black" class="ind">My Profile updated successfully</P>
                  <a href="AddBookAcc.php">
                  <input type="button" name="submit" value="Back to My Profile!"onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" font style="cursor:pointer; width:30%; height: 40px;margin:0% 0% 0% 35%; background: rgba(0%,0%,0%,0.8); color:#FFFFFF">
                  </a>
                  </div>';
        } else {
            echo "Error updating record: " .mysql_error($connect);
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
