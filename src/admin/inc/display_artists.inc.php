<?php
function displayFullArtists($results){
	?>
	<div class="table-responsive">
		<table class="table table-hover table-striped table-condensed">
			<thead>
			<tr>
				<th>Name</th>
				<th>City</th>
				<th>Website</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($results as $row) {
				$artistid = $row->artistid;
				?>
				<tr>
					<td><?php echo $row->name ?></td>
					<td><?php echo $row->city ?></td>
					<td><?php echo $row->website ?></td>
					<td>
						<?php
						echo "<a class='btn btn-default' href='edit_artist.php?artist=$artistid'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span> </a>" ;
						echo "<a class='btn btn-default' href='#'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </a>" ;
						?>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
	<?php
}

function receiveOneArtist($result){
	global $artistname, $artistcity, $artistwebsite;
	$artistname = $result->name;
	$artistcity = $result->city;
	$artistwebsite = $result->website;

}