<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>Welcome to My Profile</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css" />
    <style type="text/css"></style>
	</head>   
    <body> 
        <div id="wrapper"> 
        <div id="content">
    <?php
    include('AddBookHeader.php');
    include('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookDB.php'); 
    if(!$_SESSION["userid"]){
        $url = "AddBookInd.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";   
    }
    if($_SESSION["userid"]){

        $sql="SELECT * FROM Account WHERE id = '".$_SESSION["userid"]."'";      
        $result = mysql_query($sql);
        if ($result){
            echo '
            <div id="white">
            <div id="do">Welcome to my profile</div>
            <table><tr>';
            echo '
            <th>Name</th>
            <th>Email</th>
            <th>Account create date</th>
            <th>Facebook user</th>
            </tr>
            ';
            $row = mysql_fetch_array($result);
            if ($row){
                echo '<tr>';
                echo '<td>'; 
                echo($_SESSION['facebook'])?$_SESSION['facebook']['name']: $row['Name'];
                echo '</td>';
                echo '<td>' ;
                echo($_SESSION['facebook'])?$_SESSION['facebook']['email']:$row['Email'];
                echo '</td>';
                echo '<td>' . $row['reg_date'] . '</td>';
                echo '<td>';
                echo($_SESSION['facebook'])? 'Yes':'No';
                echo'</td>';         
            }
            echo '</tr></table>';
            if(!$_SESSION['facebook']){
                echo ' <input type="button" value="Edit" onclick="location.href=`AddBookAccEdt.php`" style="font-size: 10pt; width:20%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF; cursor:pointer;">';
                echo ' <input type="button" value="Change Password" onclick="location.href=`AddBookCP.php`" style="font-size: 10pt; width:20%; height: 25px; background: rgba(0%,0%,0%,0.8); color:#FFFFFF; cursor:pointer;">';
            }
            echo '</div>';
        }
        mysql_close($connect);
        }
    ?>
        </div><!-- #content -->
        <div id="footer">
            <a href="mailto:contact@myaddbook.com?Subject=Hello" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"  style="text-decoration:none; color:#FFFFFF;" target="_top"> 
            <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookAbout.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookLoc.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
            <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="20" width="15%" ></a></p>
        </div><!-- #footer -->
        </div><!-- #wrapper -->
    </body>
</html>    