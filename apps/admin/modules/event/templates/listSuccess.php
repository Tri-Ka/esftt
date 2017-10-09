<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Evènements <small>Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-calendar"></i> Evènements
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
						<th><?php echo __('du'); ?></th>
						<th><?php echo __('au'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>

	            <tbody>
		        	<?php foreach ($events as $event): ?>
		        		<tr>
							<th><?php echo $event->getId(); ?></th>
							<td><?php echo $event->getName(); ?></td>
							<td><?php echo $event->getDateFrom(); ?></td>
							<td><?php echo $event->getDateTo(); ?></td>
							<td>
								<a href="<?php echo url_for('event_edit', array('id' => $event->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('event_delete', array('id' => $event->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>
		        	<?php endforeach; ?>
	    		</tbody>
	        </table>

	        <?php include_partial('general/pagination', array('pager' => $events, 'url' => url_for('event_list'))); ?>
	    </div>
	</div>
	<div class="col-xs-12">
		<a href="<?php echo url_for('event_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>

</div>
