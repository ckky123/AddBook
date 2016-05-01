<?PHP
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
  if (!$_SESSION['userid']&&!$_SESSION['facebook']){
        $url = "AddBookInd.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
  }

if($_POST['captcha'] != $_SESSION['digit']){
    die("Sorry, the CAPTCHA code entered was incorrect!");
    session_destroy();
               }
else{
    $_SESSION['cap']=1;    
      $url = "AddBookLogin.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
?>