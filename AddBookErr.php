<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" ontent="text/html; charset=UTF-8">
        <title>Log in Error</title>
        <script src="AddBookJS.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
    <style type="text/css"></style>
	</head>
	<body>	
        <div id="wrapper">      
        <header>
            <h1 id="h1"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="60" width="35%" ></a></h1> 
            <?php
             echo'<br><br><br><br><br><br><br><div id="black"><p id="do">Uername or password error</p>';
            ?>
        </header>     
        <div id="content"> 
        <?php           
            echo'
            <div id="black"><p id="do"><br><br>Please use valid user name and password to log in again! Thank you! </p><br>
            <a href="AddBookInd.php?"> 
            <input type="button" value="Log in" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"  style="font-size: 10pt; width:30%; height: 40px;margin:0% 0% 0% 35%; background: rgba(0%,0%,0%,0.8); color:#FFFFFF">
            </a></div>';
        ?>
        </div><!-- #content -->
        <div id="footer">
                <a href="mailto:contact@myaddbook.com?Subject=Hello" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="text-decoration:none; color:#FFFFFF;" target="_top"> 
                <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="AddBookAbout.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="AddBookLoc.php"  onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
                <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book" height="20" width="15%" ></a></p>
        </div><!-- #footer -->
        </div><!-- #wrapper -->
    </body>
</html>



