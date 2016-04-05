<?php
require '../inc/access.inc.php';
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';
$userNames = $customer->getEmails();
var_dump($userNames);
?>

	<div class="form-horizontal">
		<form class="form" id="addUserForm" method="post" action="">
			<div class="form-group">
				<legend>Register a new user</legend>
			</div>
			<div class="form-group">
				<label for="emailAddress" class="col-sm-2 control-label">Email Address</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" required autofocus id="emailAddress"
						   placeholder="Email Address"
						   >
				</div>
			</div>
			<div class="form-group">
				<label for="customerName" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="customerName" placeholder="Customer Name"
						   pattern="[a-z]+([a-z]+)?" required>
				</div>
			</div>
			<div class="form-group">
				<label for="customerStreet" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="customerStreet" placeholder="Customer Street"
						   required>
				</div>
			</div>
			<div class="form-group">
				<label for="customerTown" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="customerTown" placeholder="Customer Town"
						   required>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" placeholder="Password"
						   required>
				</div>
			</div>
			<div class="form-group">
				<label for="confirmPassword" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password"
						   required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button id="submitAddUser" class="btn btn-primary" type="button">Submit</button>
				</div>
			</div>
		</form>
	</div>
<?php
require_once '../inc/scripts.inc.php';
?>
	<script>
		$(document).ready(function () {
			var usernames = getEmails();
			$('#submitAddUser').click(function () {
				var email = $('#emailAddress').val().toLowerCase();
				checkEmail(email, usernames, function (check) {
					if(!check){
						console.log('email Invalid');
					} else{
						$('#addUserForm').submit();
					}
				});
			});
		});
		var checkEmail = function (email, usernames, done) {
			if(email.length < 2){
				done(false);
				return;
			}
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
			var check = $.inArray(email, usernames) < 0;
			if(!check){
				done(check);
				return;
			}
			check = emailReg.test(email);
			done(check);
		};

		var getEmails = function () {
			var usernames = [];
			<?php foreach($userNames as $key => $val) {
			foreach ($val as $key2 => $val2) {
			?>
			usernames.push(<?php echo "'$val2'" ?>);
			<?php }
			}?>
			return usernames;
		}
	</script>
<?php
require_once '../inc/foot.inc.php';
?>