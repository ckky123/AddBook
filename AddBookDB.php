<?php
include('/home/hudson/pg/kqpm28/AddBookPsw/AddBookPsw.php');
$connect = mysql_connect('myeusql.dur.ac.uk','kqpm28',$password);

if (!$connect) {
    die('Could not connect: ' . mysqli_error($connect));
}
else{
    mysql_select_db('Ikqpm28_myAddDB'); 
}
?>