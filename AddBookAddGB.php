<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
include('AddBookDB.php');
if ($_SESSION["userid"]) {
    
    $sql="INSERT INTO guestbook (userid, Comment) VALUES ('". $_SESSION['userid'] ."', '". $_GET['Comment'] ."')";
    
    if (!mysql_query($sql,$connect)) {
         echo "error";
    }
} else {
    echo "error";
}
mysql_close($connect);
?>