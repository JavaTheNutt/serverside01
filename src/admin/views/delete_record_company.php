<?php
require '../inc/access.inc.php';
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';
if (isset($_REQUEST['Submit'])) {
	try {
		$compid = $_POST['compid'];
		$stat = 'delete';
		$recordCompany->deleteRecord($compid);
		header("Location:all_record_companies.php?stat=$stat");
	} catch (PDOException $e) {
		echo '<br>PDO Exception Caught.';
		echo 'Error with the database: <br>';
		echo 'Error: ' . $e->getMessage() . '</p>';
	}
} else {
	$compid = $_GET['recordcompany'];
	try {
		$record = $recordCompany->oneRecordCompany($compid);
		receiveOneCompany($record);
	} catch (PDOException $e) {
		echo '<br>PDO Exception Caught.';
		echo 'Error with the database: <br>';
		echo 'Error: ' . $e->getMessage() . '</p>';
	}
}
?>
	<form action="" class="form-horizontal" method="post" id="delete_record_company" name="delete_record_company">
		<fieldset>
			<legend>Update a record company</legend>
			<input type="hidden" name="compid" id="compid" value="<?php echo $compid; ?>">
			<div class="form-group">
				<label for="company_name" class="col-sm-3 control-label">Company Name</label>
				<div class="col-sm-9">
					<input type="text" name="company_name" id="company_name" class="form-control" required autofocus
						   pattern="[A-Za-z ]{3,}" title="Please enter a valid Company Name" disabled
						   value="<?php echo $companyname ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="company_city" class="col-sm-3 control-label">Company City</label>
				<div class="col-sm-9">
					<input type="text" name="company_city" id="company_city" class="form-control"
						   pattern="[A-Za-z ]{3,}" title="Please enter a valid City Name" disabled
						   value="<?php echo $companycity ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="company_rep" class="col-sm-3 control-label">Company Representative</label>
				<div class="col-sm-9">
					<input type="text" name="company_rep" id="company_rep" class="form-control" autofocus
						   pattern="[A-Za-z ]{3,}" title="Please enter a valid Company Rep" disabled
						   value="<?php echo $representative ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="rep_email" class="col-sm-3 control-label">Representative Email</label>
				<div class="col-sm-9">
					<input type="email" name="rep_email" id="rep_email" class="form-control" autofocus
						   pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"
						   title="Please enter a valid email address" disabled
						   value="<?php echo $representativeemail ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="company_website" class="col-sm-3 control-label">Company Wesite</label>
				<div class="col-sm-9">
					<input type="url" name="company_website" id="company_website" class="form-control" required
						   autofocus pattern="https?://[a-zA-Z]{3}\.[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}"
						   value="<?php echo $website ?>"
						   title="Please enter a valid url" disabled>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type="submit" class="btn btn-primary" value="Delete Record Company" name="Submit">
					<input type="reset" class="btn btn-primary" value="Clear the Info">
				</div>
			</div>
		</fieldset>
	</form>
<?php
require_once '../inc/scripts.inc.php';
require_once '../inc/foot.inc.php';