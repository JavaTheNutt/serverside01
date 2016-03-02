<?php
require_once '../../inc/init.inc.php';
require_once '../../inc/head.inc.php';
if (isset($_GET['stat'])) {
	$stat = $_GET['stat'];
	if ($stat == 'add') {
		echo '<br><h2>Record Company added successfully</h2>';
	} elseif ($stat == 'edit') {
		echo '<br><h2>Record Company edited successfully</h2>';
	} elseif ($stat = 'delete') {
		echo '<br><h2>Record Company deleted successfully</h2>';
	}
}
?>
<div class="row">
	<div class="btn-group">
		<a class="btn btn-primary" href="add_record_company.php"><span class="glyphicon glyphicon-save" style="margin-right: 10px"></span> Add a
			record company</a>
		<button class="btn btn-primary" id="showSearch"><span class="glyphicon glyphicon-search"></span> Search</button>
	</div>
</div>
<div class="row hidden" id="recordSearchBox" style="margin-top: 20px; margin-bottom: 20px">
		<form action="" method="post" name="search_record_companies" class="form-inline">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="attrSelect">Please select an attribute</label>
					<select id="attrSelect" name="attrSelect" class="form-control">
						<?php
						foreach ($recordCompany->fields as $field => $fieldName) {
							?>
							<option value="<?php echo $field ?>"><?php echo $fieldName ?></option>
							<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="valSelect">Value</label>
					<input type="text" id="valSelect" class="form-control" name="valSelect" required
						   title="please enter a value">
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<button type="submit" name="Submit" class="btn btn-danger"><span class="glyphicon glyphicon-search"></span> Submit</button>
				</div>
			</div>
		</form>
</div>
<div class="row">
	<?php
	$count = 0;
	if (isset($_REQUEST['Submit'])) {
		$attr = $_POST['attrSelect'];
		$val = $_POST['valSelect'];
		try {
			$result = $recordCompany->findRecordCompanies($attr, $val);
/*			$count = count($result);*/
		} catch (PDOException $e) {
			echo '<br>PDO Exception Caught.';
			echo 'Error with the database: <br>';
			echo 'Error: ' . $e->getMessage() . '</p>';
		}
	} else {
		try {
			$result = $recordCompany->allRecordCompanies();

		} catch (PDOException $e) {
			echo '<br>PDO Exception Caught.';
			echo 'Error with the database: <br>';
			echo 'Error: ' . $e->getMessage() . '</p>';
		}
	}
	$count = count($result);
	if ($count > 0) {
		displayFullCompanies($result);
	} else {
		echo '<br>No record companies';
	}
	?>
</div>
<?php
require_once '../../inc/scripts.inc.php';
?>
<script>
	$(document).ready(function () {
		$('#showSearch').click(function () {
			console.log('test');
			$('#recordSearchBox').toggleClass('hidden');
		})
	})
</script>
<?php
require_once '../../inc/foot.inc.php';
?>

