<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>Change Password</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <script type="text/javascript" src="AddBookJS.js"></script>
        <style type="text/css"></style>
	</head>   
    <body> 
        <div id="wrapper"> 
        <div id="content">
        <?php
        include('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookDB.php');
        if(!$_SESSION["userid"]){
            $url = "AddBookInd.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";   
        }
        else{
            include('AddBookHeader.php');
            echo '<div id="white"><div id="do"> Change your password</div>
                 <form method="POST" action="AddBookCPU.php">' ;   
            echo '
                <div id="black">
                <p class="black">Current password<br> <input type=password" name="password" size="30" value="" onkeyup="PasswordCheck(this.value)">
                <label id=PasswordHint type="text">*</label></p> 
                <p class="black">New password<br><input type="password" name="newpassword" size="30" value="" onkeyup="newPasswordCheck(this.value)" >
                <label id=newPasswordHint type="text">*</label></p> 
                <input type="submit" name="var_submit" value="Update" onclick="return confirm(\'Are you sure you want to Change password?\')" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="font-size: 10pt; width:10%; height: 25px; background:rgba(0%,0%,0%,0.8); color:#FFFFFF;cursor:pointer;">
                <input type="reset" name="var_reset" value="Clear all" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="font-size: 10pt; width:10%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF;cursor:pointer;">            
                </form>
                </div></div>';
        }
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