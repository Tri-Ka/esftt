<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Horaires <small>Listing</small>
        </h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-newspaper-o"></i> Horaires
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
	                    <th><?php echo __('categorie'); ?></th>
						<th><?php echo __('jours'); ?></th>
						<th><?php echo __('infos'); ?></th>
						<th><?php echo __('horaires'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>

	            <tbody>
		        	<?php foreach ($sDays as $day): ?>
		        		<tr>
							<th><?php echo $day->getId(); ?></th>
							<th><?php echo $day->getCategory(); ?></th>
							<td><?php echo $day->getDay(); ?></td>
							<td><?php echo $day->getInfo(); ?></td>
							<td><?php echo $day->getHours(); ?></td>
							<td>
								<a href="<?php echo url_for('schedule_day_edit', array('id' => $day->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('schedule_day_delete', array('id' => $day->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>
		        	<?php endforeach; ?>
	    		</tbody>
	        </table>

			<?php include_partial('general/pagination', array('pager' => $sDays, 'url' => url_for('schedule_day_list'))); ?>
	    </div>
	</div>

	<div class="col-xs-12">
		<a href="<?php echo url_for('schedule_day_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>
</div>
