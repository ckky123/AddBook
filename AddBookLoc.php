<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
include('AddBookDB.php');
include('AddBookHeader.php');
?>
<!DOCTYPE html>

<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>See our location!</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <style type="text/css"></style>
    </head>
	<body>
        <div id="wrapper"> 
        <div id="content">
        <br><br><br>        
        <div id="white"><div id="black">
        <p id="do">Josephine Butler College</p>
        <p id="center">Durham University<br>
            South Rd<br>
            Durham DH1 3DF<br>
            U.K.<br>
        <p id="center">       
        <iframe src="http://www.dr2ooo.com/tools/maps/maps.php?zoom=15&width=500&height=266&ll=54.759876,-1.579187&ctrl=true&cp=true&" width="500" height="266"></iframe>
        </p></div></div>
        </div><!-- #content -->
        <div id="footer">
            <a href="mailto:contact@myaddbook.com?Subject=Hello" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" target="_top"> 
            <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookAbout.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookLoc.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
            <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="20" width="15%" ></a></p>
        </div><!-- #footer -->
        </div><!-- #wrapper -->
    </body>
</html>