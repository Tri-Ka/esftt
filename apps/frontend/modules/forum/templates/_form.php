<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $id; ?>"><?php echo $new; ?></button>

<div id="<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="" type="post">

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

					<h3 id="myModalLabel"><?php echo $new; ?></h3>

				</div>

				<div class="modal-body">

					<?php echo $form; ?>

				</div>

				<div class="modal-footer">

					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<input class="btn btn-primary" type="submit" value="valider">

				</div>

			</form>
		</div>
	</div>
</div>