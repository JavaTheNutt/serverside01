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
if(!adminLoggedIn() && !custLoggedIn()){
	echo '<h3>You are not logged in. Please log in for full functionality</h3>';
}
?>
	<div class="row">
		<div class="btn-group">
			<?php
			if (adminLoggedIn()) {
				?>
				<a class="btn btn-primary" href="add_artist.php"><span class="glyphicon glyphicon-save"></span> Add an
					artist</a>
				<?php
			}
			?>
			<a class="btn btn-primary" id="showArtistSearch"><span class="glyphicon glyphicon-search"></span> Search</a>
		</div>
	</div>
<?php
/*$obj = $artist;*/
require '../inc/search.inc.php';
$result = $artist->allArtists();
$count = count($result);
if ($count > 0) {
	displayFullArtists($result);
} else {
	echo '<br>No artists';
}
require_once '../inc/scripts.inc.php';
?>
<script>
	$(document).ready(function () {
		$('#showArtistSearch').click(function () {
			$('#artistSearchBox').toggleClass('hidden');
		});
	});
</script>
<?php
require_once '../inc/foot.inc.php';