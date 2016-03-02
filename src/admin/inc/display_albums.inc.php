<?php
function displayAlbums($result)
{
	?>
	<div class="container">
		<?php
		foreach ($result as $row) {
			$albumid = $row->albumid;
			?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $row->albumname ?></h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-9">
						<div class="row">
							<div class="table-responsive">
								<table class="table table-striped table-hover table-condensed">
									<thead>
									<tr>
										<th>Release Year</th>
										<th>Artist</th>
										<th>Genre</th>
										<th>Record Company</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td><?php echo $row->year ?></td>
										<td><?php echo $row->artistname ?></td>
										<td><?php echo $row->genre ?></td>
										<td><?php echo $row->companyname ?></td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<?php echo "<a class='btn btn-default' href='edit_album.php?album=$albumid'><span class='glyphicon glyphicon-edit'></span> </a>" ?>
						</div>
					</div>
					<div class="col-sm-3">
						<img src="<?php echo $row->albumartwork ?>" class="img-responsive">
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

function receiveOneAlbum($result)
{
	global $albumname, $albumyear, $albumgenre, $albumrecordlabelid, $albumrecordlabelname, $albumartistid, $albumartistname, $albumartwork;
	$albumname = $result->albumname;
	$albumyear = $result->year;
	$albumgenre = $result->genre;
	$albumartistid = $result->artist;
	$albumartistname = $result->artistname;
	$albumrecordlabelid = $result->recordcompany;
	$albumrecordlabelname = $result->companyname;
	$albumartwork = $result->albumartwork;
}