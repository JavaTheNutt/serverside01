<?php
require '../inc/access.inc.php';
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';
if (isset($_REQUEST['Submit'])) {
	$name = $_POST['album_name'];
	$year = $_POST['album_year'];
	$genre = $_POST['genre'];
	$artistid = $_POST['artist'];
	$companyid = $_POST['recordcompany'];
	$albumartwork = $_POST['album_artwork'];
	try {
		$album->insertAlbum($name, $year, $genre, $artistid, $companyid, $albumartwork);
		$stat = 'add';
		header("Location:all_albums.php?stat=$stat");
	} catch (PDOException $e) {
		echo '<br>PDO Exception Caught.';
		echo 'Error with the database: <br>';
		echo 'Error: ' . $e->getMessage() . '</p>';
	}
} else {
	try {
		$artists = $artist->allArtists();
		$record_companies = $recordCompany->allRecordCompanies();
	} catch (PDOException $e) {
		echo '<br>PDO Exception Caught.';
		echo 'Error with the database: <br>';
		echo 'Error: ' . $e->getMessage() . '</p>';
	}
	if (!adminLoggedIn()) {
		?>
		<h3>You are not logged in. Please log in or return <a href="index.php">home</a></h3>
		<?php
	} else {
		?>

		<form action="" method="post" class="form-horizontal" id="insert_album" name="insert_album">
			<fieldset>
				<legend>Please enter an album</legend>
				<div class="form-group">
					<label for="album_name" class="col-sm-3 control-label">Album Name</label>
					<div class="col-sm-9">
						<input type="text" name="album_name" id="album_name" class="form-control" required autofocus
							   title="Please enter an album name">
					</div>
				</div>
				<div class="form-group">
					<label for="album_year" class="col-sm-3 control-label">Release Year</label>
					<div class="col-sm-9">
						<input type="text" name="album_year" id="album_year" class="form-control" maxlength="4" required
							   title="Please enter the year the album was released">
					</div>
				</div>
				<div class="form-group">
					<label for="genre" class="col-sm-3 control-label">Genre</label>
					<div class="col-sm-9">
						<select name="genre" id="genre" required title="Please select a genre" class="form-control">
							<option value="Grunge">Grunge</option>
							<option value="Metal">Metal</option>
							<option value="Thrash">Thrash</option>
							<option value="Pop">Pop</option>
							<option value="Rock N' Roll">Rock N' Roll</option>
							<option value="Dance">Dance</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="artist" class="col-sm-3 control-label">Artist</label>
					<div class="col-sm-8">
						<select name="artist" id="artist" class="form-control" required
								title="Please select the artist">
							<?php
							foreach ($artists as $artist) {
								$id = $artist->artistid;
								$name = $artist->artistname;
								echo "<option value='$id'>$name</option>";
							}
							?>
						</select>
					</div>
					<div class="col-sm-1">
						<a href="add_artist.php?ref=album" class="btn btn-primary">Add Artist</a>
					</div>
				</div>
				<div class="form-group">
					<label for="album_artwork" class="col-sm-3 control-label">Artwork URL</label>
					<div class="col-sm-9">
						<input type="url" name="album_artwork" id="album_artwork" class="form-control" required
							   title="Please enter the URL of the album artwork">
					</div>
				</div>
				<div class="form-group">
					<label for="recordcompany" class="col-sm-3 control-label">Record Label</label>
					<div class="col-sm-8">
						<select name="recordcompany" id="recordcompany" class="form-control" required
								title="Please select the artist">
							<?php
							foreach ($record_companies as $record_company) {
								$id = $record_company->companyid;
								$name = $record_company->companyname;
								echo "<option value='$id'>$name</option>";
							}
							?>
						</select>
					</div>
					<div class="col-sm-1">
						<a href="add_record_company.php?ref=album" class="btn btn-primary">Add Label</a>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<input type="submit" class="btn btn-primary" value="Insert Album" name="Submit">
						<input type="reset" class="btn btn-primary" value="Clear the Info">
					</div>
				</div>
			</fieldset>
		</form>
		<?php
	}
}
require_once '../inc/scripts.inc.php';
require_once '../inc/foot.inc.php';