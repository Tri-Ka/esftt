<div class="row">

	<?php include_partial('private/menu'); ?>

	<div class="col-xs-12 col-sm-8">

		<div class="no-box-title text-center marged-bottom-2">
			<?php echo __('Forum'); ?>
		</div>

		<?php foreach ($bigTopics as $bigTopic): ?>

			<div class="big-topic-title">
				<?php echo $bigTopic->getTitle(); ?>
			</div>

			<div class="box col-xs-12">

				<div class="box-content">
					<ul class="topic-list">
						<?php foreach ($bigTopic->getTopics() as $topic): ?>
							<li>
								<a href="<?php echo url_for('topic', array('id' => $topic->getId())); ?>" class="topic-info">
									<div class="author-avatar">
										<img src="<?php echo $topic->getAuthor()->retrievePictureUrl(); ?>">
									</div>
									<div class="title-part">
										<span class="title-topic"><?php echo $topic; ?></span>
										<span class="author-topic">par <?php echo $topic->getAuthor(); ?></span>
									</div>
									<div class="nb-message">
										<i class="fa fa-comments-o"></i><br>
										<?php echo $topic->getPosts()->count(); ?>
									</div>
									<div class="last-message">
										<?php if ($topic->getPosts()->getLast()): ?>
											<strong>dernier message:</strong> <br>
											<?php echo format_date($topic->getPosts()->getLast()->getCreatedAt(), 'f'); ?><br>
											de <strong><?php echo $topic->getPosts()->getLast()->getAuthor(); ?></strong>
										<?php endif; ?>
									</div>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
					<div class="text-center">
						<button type="button" class="btn btn-primary add-topic" data-toggle="modal" data-target="#myModal" data-big-topic-id="<?php echo $bigTopic->getId(); ?>">
			  				nouveau topic
						</button>
					</div>
				</div>
			</div>

		<?php endforeach; ?>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Nouveau topic</h4>
		      </div>

		      <form action="<?php echo url_for('topic_add'); ?>" method="post" class="check-empty-form">

				<div class="modal-body">

					<div class="form-group">
						<label for="topic-name">Titre</label>
						<input type="hidden" id="big-topic-id" name="big-topic-id" value="1">
						<input class="form-control check-empty" id="topic-name" name="topic-name">
						<span class="error">veuillez renseigner ce champs</span>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-primary">Valider</button>
				</div>

		      </form>
		    </div>
		  </div>
		</div>

	</div>

</div>