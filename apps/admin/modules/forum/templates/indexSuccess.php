<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Forum
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-users"></i> Forum
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
						<th><?php echo __('Topic généraux'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>
	             <tbody>

					<?php foreach ($bigTopics as $bigTopic): ?>

		        		<tr>
		        			<th><?php echo $bigTopic->getId(); ?></th>
							<th><?php echo $bigTopic->getTitle(); ?></th>
							<td>
								<a href="<?php echo url_for('forum_show', array('id' => $bigTopic->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('contenu'); ?> <i class="fa fa-eye"></i></a>
								<a href="<?php echo url_for('big_topic_edit', array('id' => $bigTopic->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('big_topic_delete', array('id' => $bigTopic->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>

		        	<?php endforeach; ?>

	    		</tbody>

	        </table>
	    </div>
	</div>
	<div class="col-xs-12">
		<a href="<?php echo url_for('big_topic_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>

</div>
