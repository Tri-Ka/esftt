<div class="col-xs-12 col-sm-8 col-md-9">
    <div class="box">

    	<div class="box-title">
    		<?php echo __('Les équipes'); ?>
    	</div>

        <div class="box-content marged-top">

        	<?php foreach ($teams as $team): ?>

        		<span class="team-name h4"><?php echo $team; ?></span>

        		<div class="row">

        		<div class="col-xs-12">

        		<?php foreach ($team->getUsers() as $user): ?>

        			<a href="<?php echo url_for('user_show', array('id' => $user->getId())); ?>">
        			<div class="col-xs-6 col-sm-2 text-center user-team-unit">

	        			<img class="img-circle img-thumbnail" src="<?php echo $user->retrievePictureUrl(); ?>">

	        			<div class="row">
		        			<strong class="col-xs-12"><?php echo $user->getLastName(); ?></strong><br>
		        			<?php echo $user->getFirstName(); ?>
	        			</div>

        			</div>
        			</a>

        		<?php endforeach; ?>

        		</div>

        		</div>

        	<?php endforeach; ?>

        </div>

    </div>
</div>
