<div class="row">

	<div class="col-xs-12 col-sm-4">

	    <?php include_partial('admin/menu'); ?>

	</div>

	<div class="col-xs-12 col-sm-8">

		<div class="box">

			<div class="box-title">
				<?php echo __('Edition de l\' utilisateur'); ?>
			</div>

			<div class="box-content marged-top">

				<?php include_partial('form', array('form' => $form)); ?>

			</div>

		</div>

	</div>

</div>