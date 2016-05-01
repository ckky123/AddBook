<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <title>Guest Book</title>
        <script src="AddBookJS.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <style type="text/css"></style>
	</head>   
    <body> 
        <div id="wrapper"> 
        <div id="content">
        <?php
            if ($_SESSION["timeout"] < time()){
                // time out
                unset($_SESSION['userid']);
                unset($_SESSION['facebook']);
                unset($_SESSION['timeout']);
            }
            if(!$_SESSION["userid"]&&!$_SESSION['facebook'])
            {
                $url = "AddBookInd.php";
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";   
            } else {
                include('AddBookHeader.php');
                include('AddBookDB.php');
                $result = mysql_query("SELECT * FROM guestbook",$connect);
                $count = mysql_num_rows($result);
                $maxPage = ceil($count / 10);
                $pageNo = (empty($_GET['page'])) ? 1 : $_GET['page'];
                $startPage = ($pageNo - 5 < 1) ? 1 : $pageNo - 5;
                echo '<div id="black">';
                if ($maxPage > 1) {
                    for ($i = $startPage; $i <= Min($startPage + 10, $maxPage); $i++) {
                        if ($i != $pageNo) {
                            echo ' <a href="AddBookGB.php?page='.$i.'">'.$i.'</a> ';
                        } else {
                            echo ' '.$i.' ';
                        }
                    } 
                }

                $queryStart = ($pageNo - 1) * 10;
                $sql="SELECT No, username, Comment, DateTime FROM guestbook LEFT JOIN Account ON guestbook.userid = Account.id ORDER BY No DESC LIMIT ".$queryStart.", 10";
                $result = mysql_query($sql,$connect);
                if ($result) {
                    echo '    
                        <table>
                            <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Time</th>
                            </tr>'; 
                    while($row = mysql_fetch_array($result)) {
                         echo'
                            <tr>
                            <td>'.$row['No'].'</td>
                            <td>'.$row['username'].'</td>
                            <td>'.$row['Comment'].'</td>
                            <td>'.$row['DateTime'].'</td>
                            </tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                }
                echo '
                    <div id="white">
                        <p>Comment<br><textarea id=Comment value=""></textarea></p>
                        <button id=AddComment onclick="AddComment() ">Submit</button>
                    </div>';
                mysql_close($connect);
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