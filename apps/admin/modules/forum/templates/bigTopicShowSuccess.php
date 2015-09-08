<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $bigTopic->getTitle(); ?>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-bullhorn"></i> <a href="<?php echo url_for('forum'); ?>">Forum</a>
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
						<th><?php echo __('Topics'); ?></th>
						<th><?php echo __('Auteur'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>
	             <tbody>

					<?php foreach ($bigTopic->getTopics() as $topic): ?>

		        		<tr>
		        			<th><?php echo $topic->getId(); ?></th>
							<th><?php echo $topic->getTitle(); ?></th>
							<th><?php echo $topic->getAuthor(); ?></th>
							<td>
								<a href="<?php echo url_for('topic_show', array('id' => $topic->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('contenu'); ?> <i class="fa fa-eye"></i></a>
								<a href="<?php echo url_for('topic_edit', array('id' => $topic->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('topic_delete', array('id' => $topic->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>

		        	<?php endforeach; ?>

	    		</tbody>

	        </table>
	    </div>
	</div>
	<div class="col-xs-12">
		<a href="<?php echo url_for('topic_new', array('bigTopicId' => $bigTopic->getId())); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>

</div>
