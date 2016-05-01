<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
include('AddBookDB.php');

function facebookUserDetails($auth_code){
    $object_details_url = 
    "https://graph.facebook.com/me?access_token=$auth_code";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $object_details_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $details = json_decode(curl_exec($ch), true);
    return $details;
}

$code = $_GET['code'];
$app_id = "1199286423433114";
$canvas_page = "https://community.dur.ac.uk/tsung-hua.lee/AddBook/AddBookFB.php";
$app_secret="55d4fb384e8509f5d1953ca5a8bcea44";

$auth_url  = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&redirect_uri=$canvas_page&client_secret=$app_secret&code=$code";
$auth_info = file_get_contents("$auth_url");

$auth_info = substr($auth_info,13);
$index = strpos($auth_info,'&');
$token = substr($auth_info,0,$index);

$userdetails = facebookUserDetails($token);

$user_id=$userdetails['id'];
$_SESSION['facebook']=$userdetails;
$_SESSION['userid']=$_SESSION['facebook']['id'];
$name =$_SESSION['facebook']['name'];

if (isset($_SESSION['userid'])){
	$username = $_SESSION['userid'];
	$query = "select count(*) as 'cnt' from Account where username = '$username'";
	$result = mysql_query($query);
	$count = mysql_result($result, 0, 'cnt');
	if ($count==0){
		$query = "insert into Account (username, facebookuser) values ('$username',1)";
		$result2 = mysql_query($query);
		$query = "select id from Account where username = '$username'";
		$result3 = mysql_query($query);
		$_SESSION['userid'] = mysql_result($result3, 0, 'id');
		$_SESSION['username'] = $username;
	}else{
		$query = "select id from Account where username = '$username'";
		$result3 = mysql_query($query);
		$_SESSION['userid'] = mysql_result($result3, 0, 'id');
		$_SESSION['username'] = $username;
        $_SESSION['timeout'] = time() + 1200;
	}
	echo "<script>alert('Welcome $name! You are log in with Facebook!'); window.location.href='AddBookLogin.php'; </script>";   
}
?>