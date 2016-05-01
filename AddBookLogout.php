<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
unset($_SESSION['userid']);
unset($_SESSION['time']);
unset($_SESSION['facebook']);
unset($_SESSION['username']);
?>

<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>My Address Book</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <script src="AddBookJS.js" type="text/javascript"></script>
        <style type="text/css"></style>
    </head>
	<body>
        <br>
        <div id="wrapper"> 	
        <header>  
            <h1 id="h1"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book" height="60" width="35%" ></a></h1>  
        </header>
        <div id="content"> 
        <?php
        echo'
            <div id="black"><p class="ind">Log out successful! See you later!</p>
                <a href="AddBookInd.php">
                    <input type="button" value="Back to Log in page" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" font style="cursor:pointer; width:30%; height: 40px;margin:0% 0% 0% 35%; background: rgba(0%,0%,0%,0.8); color:#FFFFFF;">
                </a>
            <br><br><br><br></div><br><br><br><br><br><br><br><br>
            ';
        ?> 
        </div><!-- #content -->
        <div id="footer">
            <a href="mailto:contact@myaddbook.com?Subject=Hello" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" target="_top"> 
            <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookAbout.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"  style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookLoc.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
            <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="20" width="15%" ></a></p>
        </div><!-- #footer -->
        </div><!-- #wrapper -->
    </body>
</html>
