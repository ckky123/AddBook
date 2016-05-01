<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>Add New Conact</title>
        <script src="AddBookJS.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <style type="text/css"></style>
    </head>
	<body>
        <div id="wrapper"> 
        <div id="content">  
        <?php
        if(!$_SESSION["userid"]){
            $url = "AddBookInd.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";   
        }
        else{
            include('AddBookHeader.php');
            echo'     
                <div id="white">
                    <div id="do"> Add New Contact</div>   
                        <form method="POST" action="AddBookIns.php" onSubmit="return IsNullNameSubmit();"> 
                            <p>Name<br> <input type="text" name="name" size="30" value="'.$name.'" onkeyup="IsNullName(this.value)">
                            <label id=NameHint type="text">*</label></p>
                            <p>Address<br> <input type="address" name="address" size="30" ></p>
                            <p>Email<br><input type="email" name="email" size="30" ></p>
                            <p>Phone Number<br> <input type="tel" name="number" size="30" ></p>
                            <input type="submit" name="var_submit" value="Submit"  onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" onclick="return confirm(\'Are you sure you want to submit?\')" style="font-size: 10pt; width:10%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF;cursor:pointer;">
                            <input type="reset" name="var_reset" value="Clear all" onclick="return AddNameHint();" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" onclick="return confirm(\'Are you sure you want to clear all?\')"   style="font-size: 10pt; width:10%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF;cursor:pointer;">		
                        </form>
                    </div>';
        }
        ?>
    </div><!-- #content -->
    <div id="footer">
        <a href="mailto:contact@myaddbook.com?Subject=Hello" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" target="_top"> 
        <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="AddBookAbout.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"  style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="AddBookLoc.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"  style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
        <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="20" width="15%" ></a></p>
    </div><!-- #footer -->
    </div><!-- #wrapper -->
</body>
</html>