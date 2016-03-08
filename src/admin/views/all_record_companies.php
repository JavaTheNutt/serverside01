<?php
require '../inc/access.inc.php';
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';
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
if (!loggedIn()) {
	echo '<h3>You are not logged in. Please log in for full functionality</h3>';
}
?>

<div class="row">
	<div class="btn-group">
		<?php
		if (loggedIn()) {
			?>
			<a class="btn btn-primary" href="add_record_company.php"><span class="glyphicon glyphicon-save"
																		   style="margin-right: 10px"></span> Add a
				record company</a>
			<?php
		}
		?>
		<button class="btn btn-primary" id="showSearch"><span class="glyphicon glyphicon-search"></span> Search</button>
	</div>
</div>
<?php
$obj = $recordCompany;
require '../inc/search.inc.php';
?>
<div class="row">
	<?php
	$count = 0;
	if (isset($_REQUEST['Submit'])) {
		$attr = $_POST['attrSelect'];
		$val = $_POST['valSelect'];
		try {
			$result = $recordCompany->findRecordCompanies($attr, $val);
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
require '../inc/scripts.inc.php';
?>
<script>
	$(document).ready(function () {
		$('#showSearch').click(function () {
			$('#recordSearchBox').toggleClass('hidden');
		});
	});
</script>
<?php
require '../inc/foot.inc.php';
?>

