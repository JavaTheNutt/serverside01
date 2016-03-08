<?php
require '../inc/access.inc.php';
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';
if (isset($_GET['stat'])) {
	$stat = $_GET['stat'];
	if ($stat == 'add') {
		echo '<br><h2>Artist added successfully</h2>';
	} elseif ($stat == 'edit') {
		echo '<br><h2>Artist edited successfully</h2>';
	} else {
		echo '<br><h2>Artist deleted successfully</h2>';
	}
}
?>
	<div class="btn-group">
		<a class="btn btn-primary" href="add_artist.php"><span class="glyphicon glyphicon-save"></span> Add an
			artist</a>
	</div>
<?php
$result = $artist->allArtists();
$count = count($result);
if ($count > 0) {
	displayFullArtists($result);
} else {
	echo '<br>No artists';
}
require_once '../inc/scripts.inc.php';
require_once '../inc/foot.inc.php';