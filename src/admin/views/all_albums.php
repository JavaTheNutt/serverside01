<?php
require '../inc/access.inc.php';
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';
if (isset($_GET['stat'])) {
	$stat = $_GET['stat'];
	if ($stat == 'add') {
		echo '<br><h2>Album added successfully</h2>';
	} elseif ($stat == 'edit') {
		echo '<br><h2>Album edited successfully</h2>';
	} else {
		echo '<br><h2>Album deleted successfully</h2>';
	}
}
if (isset($_GET['recordcompany'])) {
	$label = $_GET['recordcompany'];
	$result = $album->getByLabel($label);
} else {
	$result = $album->allAlbums();
}
$count = count($result);
?>
	<div class="btn-group" style="margin-bottom: 20px;">
		<a class="btn btn-primary" href="add_album.php"><span class="glyphicon glyphicon-save"></span> Add an
			Album</a>
	</div>
<?php
if ($count > 0) {
	displayAlbums($result);
} else {
	echo '<br>No albums';
}
?>

<?php
require_once '../inc/scripts.inc.php';
require_once '../inc/foot.inc.php';