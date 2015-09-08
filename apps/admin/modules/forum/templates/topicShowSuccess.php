<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $topic->getTitle(); ?>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-bullhorn"></i> <a href="<?php echo url_for('forum'); ?>">Forum</a> / <a href="<?php echo url_for('forum_show', array('id' => $topic->getBigTopicId())); ?>"><?php echo $topic->getBigTopic()->getTitle(); ?></a>
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
						<th><?php echo __('Auteur'); ?></th>
						<th><?php echo __('Contenu'); ?></th>
						<th><?php echo __('actions'); ?></th>
	                </tr>
	            </thead>
	             <tbody>

					<?php foreach ($topic->getPosts() as $post): ?>

		        		<tr>
		        			<th><?php echo $post->getId(); ?></th>
							<th><?php echo $post->getAuthor(); ?></th>
							<th><?php echo $post->getcontent(); ?></th>
							<td>
								<a href="<?php echo url_for('post_edit', array('id' => $post->getId())); ?>" class="btn btn-default btn-xs"><?php echo __('editer'); ?> <i class="fa fa-pencil"></i></a>
			        			<a href="<?php echo url_for('post_delete', array('id' => $post->getId())); ?>" class="btn btn-danger btn-xs"><?php echo __('supprimer'); ?> <i class="fa fa-times"></i></a>
			        		</td>
				        </tr>

		        	<?php endforeach; ?>

	    		</tbody>

	        </table>
	    </div>
	</div>
	<div class="col-xs-12">
		<a href="<?php echo url_for('post_new'); ?>" class="btn btn-success btn-sm"><?php echo __('nouveau'); ?> <i class="fa fa-plus"></i></a>
	</div>

</div>
