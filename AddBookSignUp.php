<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
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
        <?php
        include('AddBookDB.php');
        if ($connect){
            $psw=SHA1($_POST["password"]);
            // Insert data to table MyAddBook
            $sql = "INSERT INTO Account (username, password, Name, Email)
                    VALUES ('".$_POST["username"]."','".$psw."','".$_POST["Name"]."','".$_POST["Email"]."')";
                    
            if (mysql_query($sql,$connect) === TRUE) {
                echo '<div id="black"><p id="center">New account created successfully</p>';
                echo'<a href="AddBookInd.php?"> 
                    <p id="center"><input type="button" value="Log in now!" style="font-size: 10pt; width:10%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF";cursor:pointer;">
                    </p></a></div>'; 
            }else {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
            mysql_close($connect);               
        }
        ?>
        </div><!-- #content -->
        <div id="footer">
            <a href="mailto:contact@myaddbook.com?Subject=Hello" style="text-decoration:none; color:#FFFFFF;" target="_top"> 
            <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookAbout.php"  style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookLoc.php"  style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
            <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="20" width="15%" ></a></p>
        </div><!-- #footer --> 
        </div><!-- #wrapper -->       
    </body>
</html>   