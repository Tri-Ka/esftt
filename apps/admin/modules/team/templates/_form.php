<form action="" method="post" class="article-form" enctype="multipart/form-data">

	<?php echo $form->renderHiddenFields() ?>

	<div class="col-xs-12 col-sm-6">

	 	<div class="form-group">
	 		<label><?php echo __('Nom'); ?></label>
	 		<?php echo $form['name']->render(array('class' => 'form-control')); ?>
		</div>	

		<?php if (!$form->getObject()->isNew()): ?>

			<label><?php echo __('Membres'); ?></label>

			<div class="row">

				<?php foreach ($form->getObject()->getUserTeams() as $userTeam): ?>
					
					<?php include_partial('team/userItem', array('user' => $userTeam->getUser(), 'team' => $form->getObject(), 'inTeam' => true, 'isCaptain' => $userTeam->getIsCaptain())); ?>

				<?php endforeach; ?>

			</div>

		<?php endif; ?>

	</div>

	<?php if (!$form->getObject()->isNew()): ?>

		<div class="col-xs-12 col-sm-6">

			<label><?php echo __('Membres disponibles'); ?></label>	

			<div class="row">

				<?php foreach ($membersWithoutTeam as $user): ?>

					<?php include_partial('team/userItem', array('user' => $user, 'team' => $form->getObject(), 'inTeam' => false)); ?>

				<?php endforeach; ?>

			</div>

		</div>

	<?php endif; ?>

	<div class="col-xs-12">

		<div class="form-group">
	 		<input type="submit" class="btn btn-primary" value="enregistrer">
		</div>				

	</div>

</form>