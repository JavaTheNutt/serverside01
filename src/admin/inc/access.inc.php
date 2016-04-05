<?php
require 'db.inc.php';
session_start();

if (isset($_POST['uname'])) {
	$username = $_POST['uname'];
	if (strpos($username, '@') == false){
		$password = SHA1($_POST['password']);
		$stmt = $dbh->prepare("SELECT * FROM users WHERE uname = :username AND password = :pass");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':pass', $password, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if ($count == 1) {
			$_SESSION['adminLoggedIn'] = true;
		} else {
			?>
			<script>
				alert("Invalid username or password");
			</script>
			<?php
		}
	} else{
		$password = SHA1($_POST['password']);
		$stmt = $dbh->prepare("SELECT * FROM customers WHERE customeremail = :username AND customerpassword = :pass");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':pass', $password, PDO::PARAM_STR);
		$stmt->execute();
		$customer = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();
		if ($count == 1) {
			$_SESSION['custLoggedIn'] = true;
			$_SESSION['custName'] = $customer-> customername;
		} else {
			?>
			<script>
				alert("Invalid username or password");
			</script>
			<?php
		}
	}

}
/*function getCustname(){
	$stmt = $dbh->prepare("SELECT customername FROM customers");
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_OBJ);

}*/
function adminLoggedIn()
{
	return isset($_SESSION['adminLoggedIn']);
}
function custLoggedIn(){
	return isset($_SESSION['custLoggedIn']);
}
if (isset($_REQUEST['logout'])) {
	session_unset();
	session_destroy();
}

$inactive = 600;

if (isset($_SESSION['timeout'])) {
	$sessionTTL = time() - $_SESSION['timeout'];
	if ($sessionTTL > $inactive) {
		unset($_SESSION['authorized']);
		session_destroy();
	}
}
$_SESSION['timeout'] = time();

?>