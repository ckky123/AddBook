<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>Edit the contact</title>
        <script src="AddBookJS.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <link type="text/css" rel="stylesheet" href="handheldstyle.css" media="handheld" /> 
        <style type="text/css"></style>
	</head>   
    <body> 
        <div id="wrapper"> 
        <div id="content">
        <?php
        include('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookDB.php');
        if ($_SESSION["timeout"] < time()){
            // time out
            unset($_SESSION['userid']);
            unset($_SESSION['facebook']);
            unset($_SESSION['timeout']);
        }
        if(!$_SESSION["userid"]){
            $url = "AddBookInd.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";   
        } else {
            include('AddBookHeader.php');
            $sql="SELECT * FROM MyAddBook WHERE id = '".$_GET[id]."' AND userid = '".$_SESSION['userid']."'";
            
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);
            if ($row) {
                $id=$row['id'];
                $name=$row['Name'];
                $address=$row['Address'];
                $email=$row['Email'];
                $phonenumber=$row['PhoneNumber'];
                echo '<div id="white"><div id="do"> Edit your Contact</div>
                      <form method="POST" action="AddBookUpd.php?id='.$_GET[id].'" onSubmit="return IsNullNameSubmit();">
                          <p>Name<br> <input type="text" name="name" size="30" value="'.$name.'" onkeyup="IsNullName(this.value)">
                              <label id=NameHint type="text"></label></p>
                          <p>Address<br> <input type="text" name="address" size="30" value="'.$address.'"></p>
                          <p>Email <br><input type=email" name="email" size="30" value="'.$email.'"></p>
                          <p>Phone Number<br> <input type="tel" name="number" size="30" value="'.$phonenumber.'"></p>
                          <input type="submit" name="var_submit" value="Update" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="font-size: 10pt; width:10%; height: 25px; background:rgba(0%,0%,0%,0.8); color:#FFFFFF;cursor:pointer;">
                          <input type="reset" name="var_reset" value="Reset" onclick="return RemoveNameHint();" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="font-size: 10pt; width:10%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF;cursor:pointer;">            
                      </form>
                      </div>';
            } else {
                $url = "AddBookInd.php";
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>"; 
            }
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