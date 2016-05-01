<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="content-type" ontent="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Log in My Address Book</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <script type="text/javascript" src="AddBookJS.js"></script>
        <style type="text/css"></style>
	</head>
    <body>	
    <div id="wrapper"> 
    <div id="content">    
    <?php
    include('/home/hudson/pg/kqpm28/AddBookPsw/AddBookPsw.php');
    $connect = mysql_connect('myeusql.dur.ac.uk','kqpm28',$password);
    
    if (!$connect) {
        die('Could not connect: ' . mysqli_error($connect));
    }else{
        mysql_select_db('Ikqpm28_myAddDB');
    }    
    if ($connect) {
        if($_POST['captcha'] != $_SESSION['digit']&&!$_SESSION['facebook']){
        $url = "AddBookInd.php";
        echo "<script type='text/javascript'>";    
        echo "alert('Please enter the CAPTCHA digits in the box provided, CAPTCHA digit is incorrect');";
        echo "window.location.href='$url'";
        echo "</script>";
        session_destroy();
        }
        if (!$_SESSION["userid"])
        {
            $sql="SELECT * FROM Account WHERE username = '".$_POST["username"]."'";
            $result = mysql_query($sql,$connect);
            if ($result)
            {
                $row = mysql_fetch_array($result);
                if(!$row){
                    $url = "AddBookErr.php";
                    echo "<script type='text/javascript'>";
                    echo "window.location.href='$url'";
                    echo "</script>";
                }else{  
                    //encrypt the password
                    $psw = SHA1($_POST["password"]);     
                    if ($psw===$row['password']){
                        $_SESSION["userid"] = $row['id'];
                        $_SESSION["username"]=$_POST["username"];
                        $_SESSION["timeout"] = time() + 1200;                
                    }else{
                        echo 'password error'; 
                    }
                }         
            }
        }
    }
    
    if ($_SESSION["timeout"] < time()){
        // time out
        unset($_SESSION['userid']);
        unset($_SESSION['timeout']);
        unset($_SESSION['facebook']);
        unset($_SESSION['username']);
    }
    if (!$_SESSION['userid']&&!$_SESSION['facebook']){
        $url = "AddBookInd.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    } else {
        include('AddBookHeader.php');
        echo'
        <form>
            <div id="black"><br><p id="search">Search (type the Name, Address, Email or Phone number )</p><input id="SearchText" type=text" size="30" onkeyup="showResult(1)" >
            <p><select id="SearchType" onchange="showResult(1)"> </P>
            <option value="">Search type:</option> 
            <option value="Name">By Name</option> 
            <option value="Address">By Address</option> 
            <option value="Email">By Email</option> 
            <option value="PhoneNumber">By Phone Number</option>                                                                   
            </select>                  
            <select id="ShowNum" onchange="showResult(1)"></P></div>
            <option value=""> Show:</option>
            <option value="5">show 5</option>
            <option value="10">show 10</option>
            <option value="20">show 20</option>
            <option value="50">show 50</option>
            <option value="100">show 100</option>
            </select>
        </form>';           
        echo'<br><div id="txtHint"><p id="search"><b>Person info will be listed here...</b></p></div><br><br>';  
    }
    ?>  
		</div><!-- #content -->
        <br><br><br><br><br><br>
        <div id="footer">
            <a href="mailto:contact@myaddbook.com?Subject=Hello" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)"style="text-decoration:none; color:#FFFFFF;" target="_top"> 
            <p id="center">@Contact us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookAbout.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="AddBookLoc.php" onmouseover="overStyle(this)" onmouseout="outStylewhite(this)" style="text-decoration:none; color:#FFFFFF;" >Location</a></p>
            <p id="center"><a href="AddBookLogin.php"><img src="Logo.png"alt="My Address Book"  height="20" width="15%" ></a></p>
        </div><!-- #footer -->
        </div><!-- #wrapper -->
	</body>
</html>



