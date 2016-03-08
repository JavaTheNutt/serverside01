<?php
function displayFullCompanies($result)
{
	?>
	<div class="table-responsive">
		<table class="table table-hover table-striped table-condensed">
			<thead>
			<tr>
				<th>Name</th>
				<th>City</th>
				<th>Representative</th>
				<th>Rep Email</th>
				<th>Website</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($result as $row) {
				$compid = $row->companyid;
				?>
				<tr>
					<td><?php echo $row->companyname ?></td>
					<td><?php echo $row->companycity ?></td>
					<td><?php echo $row->representative ?></td>
					<td><?php echo $row->representativeemail ?></td>
					<td><?php echo $row->website ?></td>
					<td>
						<?php
						if(loggedIn()) {
							echo "<a class='btn btn-default' href='edit_record_company.php?recordcompany=$compid'><span class='glyphicon glyphicon-edit'
														 aria-hidden='true'></span> </a>";
							echo "<a class='btn btn-default' href='delete_record_company.php?recordcompany=$compid'><span class='glyphicon glyphicon-trash'
														 aria-hidden='true'></span> </a>";
						}
						?>
					</td>
					<td><?php echo "<a class='btn btn-primary' href='all_albums.php?recordcompany=$compid'><span class='glyphicon glyphicon-search'> " ?></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
	<?php
}

function receiveOneCompany($result)
{
	global $companyname, $companycity, $representative, $representativeemail, $website;
	$companyname = $result->companyname;
	$companycity = $result->companycity;
	$representative = $result->representative;
	$representativeemail = $result->representativeemail;
	$website = $result->website;
}
