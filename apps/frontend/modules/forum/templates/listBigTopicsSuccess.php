<h2><?php echo __($category); ?></h2>

<ul>
	<?php foreach ($bigTopics as $bt): ?>

		<?php if (null == $bt->getTeamId()): ?>

		<li>

			<a href="<?php echo url_for('show_topics', array('big_topic_id' => $bt->getId())); ?>">

				<span class="f-title"><?php echo $bt; ?></span>
				<em class="f-subtitle"><?php echo $bt->getSubTitle(); ?></em>

			</a>

		</li>

		<?php else: ?>

			<?php if($sf_user->getGuardUser()->isInTeam($bt->getTeamId())): ?>

				<li>

					<a href="<?php echo url_for('show_topics', array('big_topic_id' => $bt->getId())); ?>">

						<span class="f-title"><?php echo $bt; ?></span>
						<em class="f-subtitle"><?php echo $bt->getSubTitle(); ?></em>

					</a>

				</li>

			<?php endif; ?>

		<?php endif; ?>

	<?php endforeach; ?>
</ul>

<?php if($sf_user->getGuardUser()->hasGroup('admin')): ?>

	<?php include_partial('form', array('form' => $form, 'new' => __('new Big Topic'))); ?>

<?php endif; ?>