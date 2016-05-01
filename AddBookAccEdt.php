<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>Edit My Profile</title>
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
    }
    else{
        include('AddBookHeader.php');       
        $sql="SELECT * FROM Account WHERE id = '".$_SESSION['userid']."'";  
        
        if($sql){
            $result = mysql_query($sql);
            while($row = mysql_fetch_array($result)) {
                $name=$row['Name'];
                $email=$row['Email'];
            }
        }         
        echo'
            <div id="white">
            <div id="do"> Edit My Profile</div>
            <form method="POST" action="AddBookAccUpd.php">             
            ' ;   
        echo'
            <p>Name<br> <input type="text" name="name" size="30" value="'. $name.'">
            <label type="text">*</label></p>          
            <p>Email <br><input type="email" name="email" size="30" value="'.$email.'">
            <label id=emailHint type="text">*</label></p>';        
        echo'
            <input type="submit" name="submit" value="Submit" style="font-size: 10pt; width:10%; height: 25px; background:rgba(0%,0%,0%,0.8); color:#FFFFFF;cursor:pointer;">
            <input type="reset" name="reset" value="Clear all" style="font-size: 10pt; width:10%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF;cursor:pointer;">            
            </form>
            </div>';
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