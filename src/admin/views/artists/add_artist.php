<?php
require_once '../../inc/init.inc.php';
require_once '../../inc/head.inc.php';
if (isset($_REQUEST['Submit'])) {
	$name = $_POST['artist_name'];
	$city = $_POST['artist_city'];
	$website = $_POST['artist_website'];
	try {
		$artist->insertArtist($name, $city, $website);
		$stat = 'add';
		if (isset($_POST['referrer'])) {
			header("Location:../albums/add_album.php");
		} else {
			header("Location:all_artists.php?stat=$stat");
		}
	} catch (PDOException $e) {
		echo '<br>PDO Exception Caught.';
		echo 'Error with the database: <br>';
		echo 'Error: ' . $e->getMessage() . '</p>';
	}
} else {
	?>
	<form action="" class="form-horizontal" method="post" id="insert_artist" name="insert_artist">
		<fieldset>
			<legend>Please enter an artist</legend>
			<?php if (isset($_GET['ref'])) {
				$ref_page = $_GET['ref'];
				echo "<input type='hidden' name='referrer' id='referrer' value='$ref_page'>";
			} ?>
			<div class="form-group">
				<label for="artist_name" class="col-sm-3 control-label">Artist Name</label>
				<div class="col-sm-9">
					<input type="text" name="artist_name" id="artist_name" class="form-control" required autofocus
						   title="Please enter a valid Artist Name">
				</div>
			</div>
			<div class="form-group">
				<label for="artist_city" class="col-sm-3 control-label">Artist City</label>
				<div class="col-sm-9">
					<input type="text" name="artist_city" id="artist_city" class="form-control" required
						   pattern="[A-Za-z ]{3,}" title="Please enter a valid City">
				</div>
			</div>
			<div class="form-group">
				<label for="artist_website" class="col-sm-3 control-label">Artist Website</label>
				<div class="col-sm-9">
					<input type="text" name="artist_website" id="artist_website" class="form-control" required
						   pattern="https?://[a-zA-Z]{3}\.[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}" value="https://"
						   title="Please enter a valid url">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type="submit" class="btn btn-primary" value="Insert Artist" name="Submit">
					<input type="reset" class="btn btn-primary" value="Clear the Info">
				</div>
			</div>
		</fieldset>
	</form>
	<?php
}
require_once '../../inc/scripts.inc.php';
require_once '../../inc/foot.inc.php';