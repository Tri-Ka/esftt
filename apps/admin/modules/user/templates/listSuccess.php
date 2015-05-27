<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Utilisateurs <small>Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-users"></i> Utilisateurs
            </li>
        </ol>
    </div>
</div>

<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="col-xs-12 flash notice">
        <?php echo $sf_user->getFlash('notice') ?>
    </div>
<?php endif ?>

<?php if ($sf_user->hasFlash('error')): ?>
    <div class="col-xs-12 flash error">
        <?php echo $sf_user->getFlash('error') ?>
    </div>
<?php endif ?>

<div class="row">

	<div class="col-xs-12">
	    <div class="table-responsive">
	        <table class="table table-bordered table-hover table-striped">
	            <thead>
	                <tr>
	                    <th>#</th>
						<th><?php echo __('username'); ?></th>
						<th><?php echo __('e-mail'); ?></th>
						<th><?php echo __('groupes'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>
	            <tbody>

		        	<?php foreach ($users as $user): ?>

		        		<tr>
							<th scope="row"><?php echo $user->getId(); ?></th>
							<td><?php echo $user->getUsername(); ?></td>
							<td><?php echo $user->getEmailAddress(); ?></td>
							<td><?php echo $user->getGroupsString(); ?></td>
							<td>
								<a href="<?php echo url_for('user_edit', array('id' => $user->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('user_delete', array('id' => $user->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>

		        	<?php endforeach; ?>

	    		</tbody>

	        </table>
	    </div>
	</div>
	<div class="col-xs-12">
		<a href="<?php echo url_for('user_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>

</div>