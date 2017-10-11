<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Categories <small>Listing</small>
        </h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-newspaper-o"></i> Categories
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
	                    <th>#</th>
						<th><?php echo __('nom'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>

	            <tbody>
		        	<?php foreach ($sCats as $cat): ?>
		        		<tr>
							<th><?php echo $cat->getId(); ?></th>
							<td><?php echo $cat->getName(); ?></td>
							<td>
								<a href="<?php echo url_for('schedule_cat_edit', array('id' => $cat->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('schedule_cat_delete', array('id' => $cat->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>
		        	<?php endforeach; ?>
	    		</tbody>
	        </table>

			<?php include_partial('general/pagination', array('pager' => $sCats, 'url' => url_for('schedule_cat_list'))); ?>
	    </div>
	</div>

	<div class="col-xs-12">
		<a href="<?php echo url_for('schedule_cat_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>
</div>
