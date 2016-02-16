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
			</tr>
			</thead>
			<tbody>
			<?php

			foreach ($result as $row) {
				$compid = $row->comapnyid;
				?>
				<tr>
					<td><?php echo $row->companyname ?></td>
					<td><?php echo $row->companycity ?></td>
					<td><?php echo $row->representative ?></td>
					<td><?php echo $row->represenativeemail ?></td>
					<td><?php echo $row->website ?></td>
					<td>
						<a class="btn btn-default" href="../views/edit_record_company.php?recordcompany=$compid"><span class="glyphicon glyphicon-edit"
														 aria-hidden="true"></span> </a>
						<a class="btn btn-default"><span class="glyphicon glyphicon-trash"
														 aria-hidden="true"></span> </a>
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

function receiveOneCompany($result){
	global $companyname, $companycity, $representative, $representativeemail, $website;
	$companyname = $result->companyname;
	$companycity = $result->companycity;
	$representative = $result->representative;
	$representativeemail = $result->representativeemail;
	$website = $result->website;
}