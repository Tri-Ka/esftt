<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Sponsors <small>Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-star"></i> Sponsors
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
						<th><?php echo __('url'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>

	            <tbody>
		        	<?php foreach ($sponsors as $sponsor): ?>
		        		<tr>
							<th><?php echo $sponsor->getId(); ?></th>
							<td><?php echo $sponsor->getName(); ?></td>
							<td><?php echo $sponsor->getLink(); ?></td>
							<td>
								<a href="<?php echo url_for('sponsor_edit', array('id' => $sponsor->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('sponsor_delete', array('id' => $sponsor->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>
		        	<?php endforeach; ?>
	    		</tbody>
	        </table>

	        <?php include_partial('general/pagination', array('pager' => $sponsors, 'url' => url_for('sponsor_list'))); ?>
	    </div>
	</div>
	<div class="col-xs-12">
		<a href="<?php echo url_for('sponsor_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>

</div>
