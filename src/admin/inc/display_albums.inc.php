<?php
function displayAlbums($result){
	?>
	<div class="container">
	<?php
	foreach($result as $row) {
		?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $row->albumname ?></h3>
	</div>
	<div class="panel-body">
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
</div>
		<?php
	}
	?>
	</div>
	<?php
}
function receiveOneAlbum($result){
	global $albumname, $albumyear, $albumgenre, $albumrecordlabelid,$albumrecordlabelname, $albumartistid, $albumartistname;
	$albumname = $result->albumname;
	$albumyear = $result->year;
	$albumgenre = $result->genre;
	$albumartistid = $result->artist;
	$albumartistname = $result->artistname;
	$albumrecordlabelid = $result->recordcompany;
	$albumrecordlabelname = $result->companyname;
}