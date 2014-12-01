<section class="col-md-8">

	<h2><?php echo __($bigTopic); ?></h2>

	<div class="folded forum bt">

		<ul class="forum-list">
			<?php foreach ($Topics as $t): ?>

				<li>

					<a href="<?php echo url_for('show_topic_messages', array('topic_id' => $t->getId())); ?>">
						<div class="t">
							<span class="f-title"><?php echo $t; ?></span><br/>
							<span class="t-by"><?php echo __('par') . ' ' . $t->getAuthor(); ?></span>
						</div>
						<i class="nb-msgs fa fa-comments-o"><br/><span class="nb"><?php echo $t->getMessages()->count(); ?></span></i>


					</a>


				</li>

			<?php endforeach; ?>
		</ul>

		<?php if($sf_user->getGuardUser()->hasGroup('admin')): ?>

			<?php include_partial('form', array('form' => $form, 'new' => __('new Topic'), 'id' => 'new_topic')); ?>

		<?php endif; ?>

	</div>

</section>
