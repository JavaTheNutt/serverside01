<div class="row hidden" id="<?php echo $obj->formId ?>" style="margin-top: 20px; margin-bottom: 20px">
	<form action="" method="post" name="<?php $obj->formName ?>" class="form-inline">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="attrSelect">Please select an attribute</label>
				<select id="attrSelect" name="attrSelect" class="form-control">
					<?php
					foreach ($obj->fields as $field => $fieldName) {
						?>
						<option value="<?php echo $field ?>"><?php echo $fieldName ?></option>
						<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="valSelect">Value</label>
				<input type="text" id="valSelect" class="form-control" name="valSelect" required
					   title="please enter a value">
			</div>
		</div>
		<div class="col-sm-2">
			<div class="form-group">
				<button type="submit" name="Submit" class="btn btn-danger"><span
						class="glyphicon glyphicon-search"></span> Submit
				</button>
			</div>
		</div>
	</form>
</div>