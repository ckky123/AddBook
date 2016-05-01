<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>About My Address Book</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <style type="text/css"></style>
    </head>
	<body>
        <div id="wrapper"> 
            <div id="content"> 
            <br>	
            <?php
            include('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookDB.php');
            include('AddBookHeader.php');
            echo'<div id="white"><br><br><p id="about">What is My Address Book?</p>
            <div id="cont"><br>My Address Book is an online address book allow user and create their own address book and also share the address book with friends.
            <br><br><li>For Social Network- connect My Address Book with your Facebook, you can use My address book with friends, just start to create your group address book!</li>
            <br><li>For Business- You can separate address book by private friends and business partner. Also can find them efficiently! </li></div></div>
            ';
            ?>
            </div><!-- #content -->
            <div id="footer">
                <a href="mailto:contact@myaddbook.com?Subject=Hello" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="text-decoration:none; color:#FFFFFF;" target="_top"> 
                <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="AddBookAbout.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="AddBookLoc.php"  onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
                <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="20" width="15%" ></a></p>
            </div><!-- #footer -->
        </div><!-- #wrapper -->
    </body>
</html>
