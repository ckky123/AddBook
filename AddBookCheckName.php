<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
include('AddBookDB.php');

$sql="SELECT * FROM Account WHERE username = '".$_GET["Name"]."'";

$result = mysql_query($sql,$connect);
$row = mysql_fetch_array($result);

if ($row){
    echo"Name Used";
}
?>