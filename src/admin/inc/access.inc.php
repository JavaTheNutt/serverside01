<?php
require 'db.inc.php';
session_start();

if(isset($_POST['uname'])){

	$password  = SHA1($_POST['password']);
	$stmt = $dbh->prepare("SELECT * FROM users WHERE uname = :username and password = :pass");
	$stmt->bindParam(':username', $_POST['uname'], PDO::PARAM_STR);
	$stmt->bindParam(':pass', $password, PDO::PARAM_STR);
	$stmt->execute();
	$count = $stmt->rowCount();
	 if($count == 1){
		 $_SESSION['loggedIn'] = true;
	 }else{
		 ?>
		 <script>
			 alert("Invalid username or password");
		 </script>
		 <?php
	 }
}
function loggedIn(){
	return isset($_SESSION['loggedIn']);
}
if(isset($_REQUEST['logout'])){
	unset($_SESSION['loggedIn']);
	session_destroy();
}

$inactive = 600;
if(isset($_SESSION['timeout'])){
	$sessionTTL = time() - $_SESSION['timeout'];
	if($sessionTTL > $inactive){
		unset($_SESSION['authorized']);
		session_destroy();
	}
}
$_SESSION['timeout'] = time();

?>