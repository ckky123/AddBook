<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
	if (isset($_SESSION['userid'])&& $_SESSION['cap']){ //do not log in twice before log out
		echo "<script> alert('You have already logged in!');parent.location.href='AddBookLogin.php'; </script>"; 
	}
?>
<!DOCTYPE html>
	<head>
        <meta http-equiv="Content-Type" ontent="text/html; charset=UTF-8">
        <title>Welcome to My Address Book</title>
        <script src="AddBookJS.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <style type="text/css"></style>
	</head>
	<body>
        <div id="fb-root"></div>
        <div id="wrapper">
        <br>
        <header>
            <h1 id="h1"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book" height="60" width="35%" ></a></h1> 
            <br><br><br><br>
            <div id="black">

            <form method="POST" action="AddBookLogin.php"> 
                <p ><br><br>User Name <input type="username" name="username" size="30" ></p>  
                <p>Password &nbsp;&nbsp;&nbsp;<input type="password" name="password" size="30"></p>
                <div class="boxs">
                <p><img src="AddBookCaptcha.php" width="120" height="30" border="2" alt="CAPTCHA">
                <input type="text" size="6" maxlength="5" name="captcha" value="" onsubmit="return checkForm(this);" >
                type the digits from the image into the box</p>
                <input type="button" name="facebook" value="log in with Facebook" onclick="facebookLogin()" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="color:#FFFFFF; width:50%; height: 25px;  background:rgba(0%,20%,80%,0.8);cursor:pointer;">  
                <div class="fb-login-button" id="facebooklogin" data-max-rows="1" data-size="medium" data-show-faces="true" data-auto-logout-link="false" onlogin="checkLoginState();">
                </div></div>
                <p ><input type="submit" name="var_submit" value="Log in" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="font-size: 10pt; width:15%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF; cursor:pointer;">
                <input type="reset" name="var_reset" value="Clear all" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="font-size: 10pt; width:15%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF; cursor:pointer;">         
                <a href="AddBookForgotP.php">
                <input type="button" value="Forgot password" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="font-size: 10pt; width:20%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF; cursor:pointer;"></a>
                <a href="AddBookSignForm.php">
                <input type="button" value="Sign Up" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="font-size: 10pt; width:15%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF; cursor:pointer;"></a>

                </form>
            
            
            </p>
            </div> 
        </header>	
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="content">
        <div id="black"><p class="ind"> Welcome to My Address Book! <br>You are still a guest, please log in to start!</p></div>
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