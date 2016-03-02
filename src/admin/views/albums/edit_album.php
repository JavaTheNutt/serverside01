<?php
require_once '../../inc/init.inc.php';
require_once '../../inc/head_fluid.inc.php';
if (isset($_REQUEST['Submit'])) {

} else {
	$id = $_GET['album'];
	try {
		$resultAlbum = $album->oneAlbum($id);
		receiveOneAlbum($resultAlbum);
	} catch (PDOException $e) {
		echo '<br>PDO Exception Caught.';
		echo 'Error with the database: <br>';
		echo 'Error: ' . $e->getMessage() . '</p>';
	}
}
?>
	<form action="" method="post" class="form-horizontal col-sm-9" id="insert_album" name="insert_album">
		<fieldset>
			<legend>Please enter an album</legend>
			<input type="hidden" name="albumid" id="albumid" value="<?php $id ?>">
			<div class="form-group">
				<label for="album_name" class="col-sm-3 control-label">Album Name</label>
				<div class="col-sm-9">
					<input type="text" name="album_name" id="album_name" class="form-control" required autofocus
						   title="Please enter an album name" disabled value="<?php echo $albumname ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="album_year" class="col-sm-3 control-label">Release Year</label>
				<div class="col-sm-9">
					<input type="text" name="album_year" id="album_year" class="form-control" maxlength="4" required
						   title="Please enter the year the album was released" disabled
						   value="<?php echo $albumyear ?>">
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
					<select name="artist" id="artist" class="form-control" required title="Please select the artist">
						<?php
						foreach ($artists as $artist) {
							$id = $artist->artistid;
							$name = $artist->artistname;
							echo "<option value='$id' disabled>$name</option>";
						}
						?>
					</select>
				</div>
				<div class="col-sm-1">
					<a href="../artists/add_artist.php?ref=edit_album" class="btn btn-primary" disabled="">Add
						Artist</a>
				</div>
			</div>
			<div class="form-group">
				<label for="recordcompany" class="col-sm-3 control-label">Record Label</label>
				<div class="col-sm-8">
					<select name="recordcompany" id="recordcompany" class="form-control" required disabled
							title="Please select the artist">
						<?php
						foreach ($record_companies as $record_company) {
							$id = $record_company->companyid;
							$name = $record_company->companyname;
							echo "<option value='$id' disabled>$name</option>";
						}
						?>
					</select>
				</div>
				<div class="col-sm-1">
					<a href="../record_companies/add_record_company.php?ref=edit_album" class="btn btn-primary"
					   disabled>Add Label</a>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type="submit" class="btn btn-primary" value="Edit Album" name="Submit">
				</div>
			</div>
		</fieldset>
	</form>
	<div class="col-sm-2">
		<img src="<?php echo $albumartwork ?>">
	</div>

<?php
require_once '../../inc/scripts.inc.php';
require_once '../../inc/foot.inc.php';