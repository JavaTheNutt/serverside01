<?php
require_once '../../inc/init.inc.php';
require_once '../../inc/head.inc.php';
if (isset($_REQUEST['Submit'])) {
	$name = $_POST['company_name'];
	$city = $_POST['company_city'];
	$rep = $_POST['company_rep'];
	$email = $_POST['rep_email'];
	$website = $_POST['company_website'];
	try {
		$recordCompany->insertRecordCompany($name, $city, $rep, $email, $website);
		$stat = "add";
		if (isset($_POST['referrer'])) {
			header('Location:../albums/add_album.php');
		} else {
			header("Location:all_record_companies.php?stat=$stat");
		}
	} catch (PDOException $e) {
		echo '<br>PDO Exception Caught.';
		echo 'Error with the database: <br>';
		echo 'Error: ' . $e->getMessage() . '</p>';
	}
} else {
	?>
	<form action="" class="form-horizontal" method="post" id="insert_record_company" name="insert_record_company">
		<fieldset>
			<legend>Please enter a record company</legend>
			<?php if (isset($_GET['ref'])) {
				$ref_page = $_GET['ref'];
				echo "<input type='hidden' name='referrer' id='referrer' value='$ref_page'>";
			} ?>
			<div class="form-group">
				<label for="company_name" class="col-sm-3 control-label">Company Name</label>
				<div class="col-sm-9">
					<input type="text" name="company_name" id="company_name" class="form-control" required autofocus
						   pattern="[A-Za-z ]{3,}" title="Please enter a valid Company Name">
				</div>

			</div>
			<div class="form-group">
				<label for="company_city" class="col-sm-3 control-label">Company City</label>
				<div class="col-sm-9">
					<input type="text" name="company_city" id="company_city" class="form-control"
						   pattern="[A-Za-z ]{3,}" title="Please enter a valid City Name">
				</div>
			</div>
			<div class="form-group">
				<label for="company_rep" class="col-sm-3 control-label">Company Representative</label>
				<div class="col-sm-9">
					<input type="text" name="company_rep" id="company_rep" class="form-control" autofocus
						   pattern="[A-Za-z ]{3,}" title="Please enter a valid Company Rep">
				</div>
			</div>
			<div class="form-group">
				<label for="rep_email" class="col-sm-3 control-label">Representative Email</label>
				<div class="col-sm-9">
					<input type="email" name="rep_email" id="rep_email" class="form-control" autofocus
						   pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"
						   title="Please enter a valid email address">
				</div>
			</div>
			<div class="form-group">
				<label for="company_website" class="col-sm-3 control-label">Company Wesite</label>
				<div class="col-sm-9">
					<input type="url" name="company_website" id="company_website" class="form-control" required
						   autofocus pattern="https?://[a-zA-Z]{3}\.[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}" value="https://"
						   title="Please enter a valid url">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type="submit" class="btn btn-primary" value="Insert Record Company" name="Submit">
					<input type="reset" class="btn btn-primary" value="Clear the Info">
				</div>
			</div>
		</fieldset>
	</form>
	<?php
}
require_once '../../inc/scripts.inc.php';
require_once '../../inc/foot.inc.php';