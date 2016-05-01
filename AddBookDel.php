<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
include('AddBookDB.php');
if ($_SESSION['userid']){
    $sql = "DELETE FROM MyAddBook WHERE id = '".$_GET['id']."' AND userid = '".$_SESSION['userid']."'";
    if (!mysql_query($sql,$connect)){
        echo 'Error';
        }
    }else{
        echo 'Error';
    }
?>