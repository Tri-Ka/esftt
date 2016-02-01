<div class="col-xs-12 col-sm-6">

	<div class="userItem">

		<?php if(isset($isCaptain) && true == $isCaptain): ?>
			<i class="fa fa-star captain"></i>
		<?php endif; ?>

		<div class="user-picture col-xs-5">
			<img class="img-thumbnail img-circle" src="<?php echo $user->retrievePictureUrl(); ?>">
		</div>

		<div class="col-xs-7">

			<div class="dropdown">
			  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
			    <i class="fa fa-bars"></i>
			  </button>
			  <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">

			  	<?php if (true == $inTeam): ?>

				    <?php if(true == $isCaptain): ?>
				    	<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo url_for('remove_captain', array('userId' => $user->getId(), 'teamId' => $team->getId())); ?>"><?php echo __('Retirer le rôle de capitaine'); ?></a></li>
				  	<?php else: ?>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo url_for('name_captain', array('userId' => $user->getId(), 'teamId' => $team->getId())); ?>"><?php echo __('Nommer capitaine'); ?></a></li>
				  	<?php endif; ?>

					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo url_for('delete_from_team', array('userId' => $user->getId(), 'teamId' => $team->getId())); ?>"><?php echo __('Retirer de l\'équipe'); ?></a></li>

				<?php else: ?>

					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo url_for('add_team_user', array('userId' => $user->getId(), 'teamId' => $team->getId())); ?>"><?php echo __('Ajouter à l\'équipe'); ?></a></li>

				<?php endif; ?>

				<li role="presentation" class="divider"></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo url_for('user_edit', array('id' => $user->getId())); ?>"><?php echo __('Editer l\'utilisateur'); ?></a></li>

			  </ul>
			</div>

			<strong><?php echo $user->getLastName(); ?></strong> <br>
			<?php echo $user->getFirstName(); ?>
		</div>
			

	</div>

</div>