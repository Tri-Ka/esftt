<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Teams <small>Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-star-o"></i> Teams
            </li>
        </ol>
    </div>
</div>

<div class="row">

	<div class="col-xs-12">
	    <div class="table-responsive">
	        <table class="table table-bordered table-hover table-striped">
	            <thead>
	                <tr>
	                    <th class="text-center">#</th>
						<th><?php echo __('nom'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>
	            <tbody>

		        	<?php foreach ($teams as $team): ?>

		        		<tr>
							<th class="text-center"><?php echo $team->getId(); ?></th>
							<td><?php echo $team->getName(); ?></td>
							<td>
								<a href="<?php echo url_for('team_edit', array('id' => $team->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('team_delete', array('id' => $team->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>

		        	<?php endforeach; ?>

	    		</tbody>

	        </table>
	    </div>
	</div>
	<div class="col-xs-12">
		<a href="<?php echo url_for('team_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>

</div>