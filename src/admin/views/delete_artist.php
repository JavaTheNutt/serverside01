<?php
require '../inc/access.inc.php';
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';
if (isset($_REQUEST['Submit'])) {
	try {
		$id = $_POST['artistid'];
		$artist->deleteArtist($id);
		$stat = 'delete';
		header("Location:all_artists.php?stat=$stat");
	} catch (PDOException $e) {
		echo '<br>PDO Exception Caught.';
		echo 'Error with the database: <br>';
		echo 'Error: ' . $e->getMessage() . '</p>';
	}
} else {
	$id = $_GET['artist'];
	try {
		$resultArtist = $artist->oneArtist($id);
		receiveOneArtist($resultArtist);
	} catch (PDOException $e) {
		echo '<br>PDO Exception Caught.';
		echo 'Error with the database: <br>';
		echo 'Error: ' . $e->getMessage() . '</p>';
	}
}
if (!adminLoggedIn()) {
	?>
	<h3>You are not logged in. Please log in or return <a href="index.php">home</a></h3>
	<?php
} else {
	?>
	<form action="" class="form-horizontal" method="post" id="delete_artist" name="delete_artist">
		<fieldset>
			<legend>Edit an artist</legend>
			<input type="hidden" name="artistid" id="artistid" value="<?php echo $id ?>">
			<div class="form-group">
				<label for="artist_name" class="col-sm-3 control-label">Artist Name</label>
				<div class="col-sm-9">
					<input type="text" name="artist_name" id="artist_name" class="form-control" required autofocus
						   title="Please enter a valid Artist Name" disabled value="<?php echo $artistname ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="artist_city" class="col-sm-3 control-label">Artist City</label>
				<div class="col-sm-9">
					<input type="text" name="artist_city" id="artist_city" class="form-control" required
						   pattern="[A-Za-z ]{3,}" title="Please enter a valid City" disabled
						   value="<?php echo $artistcity ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="artist_website" class="col-sm-3 control-label">Artist Website</label>
				<div class="col-sm-9">
					<input type="text" name="artist_website" id="artist_website" class="form-control" required
						   pattern="https?://[a-zA-Z]{3}\.[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}"
						   value="<?php echo $artistwebsite ?>"
						   title="Please enter a valid url" disabled>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type="submit" class="btn btn-primary" value="Delete Artist" name="Submit">
					<input type="reset" class="btn btn-primary" value="Clear the Info">
				</div>
			</div>
		</fieldset>
	</form>
	<?php
}
require_once '../inc/scripts.inc.php';
require_once '../inc/foot.inc.php';
