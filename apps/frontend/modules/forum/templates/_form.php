<a href="#myModal" role="button" class="btn" data-toggle="modal"><?php echo $new; ?></a>

<!-- Modal -->
<form action="" method="post">
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel"><?php echo $new; ?></h3>
		  </div>
		  <div class="modal-body">

			<?php echo $form; ?>

			</form>
		  </div>
		  <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		    <input class="btn btn-primary" type="submit" value="valider">
		  </div>
	</div>
</form>