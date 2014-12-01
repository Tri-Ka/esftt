<section class="col-md-8">

	<h2><?php echo __('Forum'); ?></h2>

	<div class="folded forum">

		<ul class="forum-list">
			<?php foreach ($categories as $c): ?>

				<li class="cat">
					<h4><?php echo $c; ?></h4>
					<ul>

					<?php foreach ($c->getBigTopics() as $bt): ?>

						<?php if (null == $bt->getTeamId()): ?>

							<li class="public">

								<a href="<?php echo url_for('show_topics', array('big_topic_id' => $bt->getId())); ?>">

									<i class="fa fa-users type"></i>
									<div class="t">
										<span class="f-title"><?php echo $bt; ?></span><br />
										<em class="f-subtitle"><?php echo $bt->getSubTitle(); ?></em>
									</div>

								</a>

							</li>

						<?php else: ?>

							<?php if($sf_user->getGuardUser()->isInTeam($bt->getTeamId())): ?>

								<li class="private">

									<a href="<?php echo url_for('show_topics', array('big_topic_id' => $bt->getId())); ?>">

										<i class="fa fa-lock type"></i>
										<div class="t">
											<span class="f-title"><?php echo $bt; ?></span><br />
											<em class="f-subtitle"><?php echo $bt->getSubTitle(); ?></em>
										</div>

									</a>

								</li>

							<?php endif; ?>

						<?php endif; ?>

					<?php endforeach; ?>

					</ul>
				</li>

			<?php endforeach; ?>
		</ul>

		<?php if($sf_user->getGuardUser()->hasGroup('admin')): ?>

			<?php include_partial('form', array('form' => $form, 'new' => __('new Category'), 'id' => 'new_cat')); ?>
			<?php include_partial('form', array('form' => $formBigTopic, 'new' => __('new Big Topic'), 'id' => 'new_bt')); ?>

		<?php endif; ?>

	</div>

</section>