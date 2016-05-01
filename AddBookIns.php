<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
include('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookDB.php');
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>Add New Conact </title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <style type="text/css"></style>
	</head>   
    <body> 
        <div id="wrapper"> 
        <div id="content">
        <?php
        include('AddBookHeader.php');
        if ($connect)
        {
            if ($_SESSION["timeout"] < time())
            {
                // time out
                unset($_SESSION['userid']);
                unset($_SESSION['facebook']);
                unset($_SESSION['timeout']);
            }
            if($_SESSION["userid"])
            {
                $_SESSION["timeout"] = time() + 1200;
                // Insert data to table MyAddBook
                $sql = "INSERT INTO MyAddBook (Name, Address, Email, PhoneNumber, userid)
                        VALUES ('".$_POST["name"]."','".$_POST["address"]."','".$_POST["email"]."','".$_POST["number"]."','".$_SESSION["userid"]."')";
                    
                if (mysql_query($sql,$connect) === TRUE){
                    echo '<div id="black"><p class="ind">New contact created successfully</p>';
                    echo'<a href="AddBookLogin.php?"> 
                        <input type="button" value="Back to Add new Contact" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="font-size: 10pt; width:30%; height: 40px;margin:0% 0% 0% 35%;  background: rgba(0%,0%,0%,0.8); color:#FFFFFF";cursor:pointer;">
                        </a>
                        <br><br><br><br></div><br><br><br><br><br><br><br><br>                
                        '; 
                }else {
                    echo "Error: " . $sql . "<br>" . $connect->error;
                }
            }  
            mysql_close($connect);     
        }
        else{
            $url = "AddBookInd.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";  
        }
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

