<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" ontent="text/html; charset=UTF-8">
        <title>Sign up</title>
        <script src="AddBookJS.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <style type="text/css"></style>
	</head>	
    	<body>        
            <div id="wrapper"> 	        
            <header>
                <h1 id="h1"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="80" ></a></h1> 
            </header>
            <div id="content">
            <div id="black">
            <div id="do"> Create your new account</div>  
            <form method="POST" action="AddBookSignUp.php " onSubmit="return CheckLength();">             
                <p>User Name<input type="text" name="username" size="30" id="username" value="" onkeyup="NameCheck(this.value)">
                <label id=NameHint type="text">*</label></p>            
                <p>Pass Word <input type="password" name="password" id="password" size="30" value="" onkeyup="PasswordCheck(this.value)">
                <label id=PasswordHint type="text">*</label></p>   
                <p>Name <input type="text" name="Name" id size="60"></p>
                <p>Email <input type="email" name="email" size="80"></p>
                <p><input type="submit" name="var_submit" id="register" value="Sign up" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"font style="cursor:pointer;width:20%; background: rgba(0%,0%,0%,0.8); color:#FFFFFF" ></p>
                <p><input type="reset" name="var_reset" value="Clear all" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"font style="cursor:pointer;width:20%; background: rgba(0%,0%,0%,0.8); color:#FFFFFF"></p>          
            </form>
            <a href="AddBookInd.php">
                <input type="button" name="var_submit" value="Back to Log in page" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"onclick="return confirm(\'Are you sure you want to submit?\')"font style="cursor:pointer; width:30%; height: 40px;margin:0% 0% 0% 35%; background: rgba(0%,0%,0%,0.8); color:#FFFFFF">
            </a>
        </div>
        </div><!-- #content -->
        <div id="footer">
            <a href="mailto:contact@myaddbook.com?Subject=Hello" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" target="_top"> 
            <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookAbout.php"  onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookLoc.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"  style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
            <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="20" width="15%" ></a></p>
        </div><!-- #footer -->  
        </div><!-- #wrapper -->     
	</body>
</html>