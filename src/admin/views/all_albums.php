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
} elseif (isset($_GET['artist'])) {
	$artist = $_GET['artist'];
	$result = $album->getByArtist($artist);
}else{
	$result = $album->allAlbums();
}
$count = count($result);
if(!adminLoggedIn()){
	echo '<h3>You are not logged in. Please log in for full functionality</h3>';
}
?>

	<div class="row">
		<div class="btn-group" style="margin-bottom: 20px;">
			<?php
			if(adminLoggedIn()) {
				?>
				<a class="btn btn-primary" href="add_album.php"><span class="glyphicon glyphicon-save"></span> Add an
					Album</a>
				<?php
			}
			?>
			<button class="btn btn-primary" id="showAlbumSearch"><span class="glyphicon glyphicon-search"></span> Search</button>
		</div>
	</div>
<?php
$obj = $album;
require '../inc/search.inc.php';
if ($count > 0) {
	displayAlbums($result);
} else {
	echo '<br>No albums';
}
?>

<?php
require_once '../inc/scripts.inc.php';
?>
<script>
	$(document).ready(function () {
		$('#showAlbumSearch').click(function () {
			$('#albumSearchBox').toggleClass('hidden');
		});
	});
</script>
<?php
require_once '../inc/foot.inc.php';