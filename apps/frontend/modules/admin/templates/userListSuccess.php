<div class="row">

<div class="col-xs-12 col-sm-4">

    <?php include_partial('admin/menu'); ?>

</div>

<div class="col-xs-12 col-sm-8">
    <div class="box">

    	<div class="box-title">
    		<?php echo __('Liste des utilisateurs'); ?>
    	</div>

        <div class="box-content marged-top">

        	<table class="table table-striped table-hover">

        		<thead>
					<tr>
						<th>#</th>
						<th><?php echo __('username'); ?></th>
						<th><?php echo __('e-mail'); ?></th>
						<th><?php echo __('actions'); ?></th>
					</tr>
			    </thead>

			    <tbody>

		        	<?php foreach ($users as $user): ?>

		        		<tr>
							<th scope="row"><?php echo $user->getId(); ?></th>
							<td><?php echo $user->getUsername(); ?></td>
							<td><?php echo $user->getEmailAddress(); ?></td>
							<td>
								<a href="<?php echo url_for('user_edit', array('id' => $user->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('user_delete', array('id' => $user->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>

		        	<?php endforeach; ?>

        		</tbody>

        	</table>
        	<div class="row">
	        	<div class="col-xs-12">
	        		<a href="<?php echo url_for('user_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	        	</div>
        	</div>

        </div>
    </div>
</div>

</div>