<?php
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';
if(isset($_GET['stat'])){
	echo '<br><h2>Publisher added successfully</h2>';
}
?>
<div class="btn-group">
	<a class="btn btn-primary" href="add_record_company.php"><span class="glyphicon glyphicon-save"></span> Add a
		record company</a>
</div>
<?php
$result = $recordCompany->allRecordCompanies();
$count = count($result);
if ($count > 0) {
	displayFullCompanies($result);
} else {
	echo 'No record companies';
}
?>
<?php
require_once '../inc/foot.inc.php';