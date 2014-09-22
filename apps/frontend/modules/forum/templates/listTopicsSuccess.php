<h2><?php echo __($bigTopic); ?></h2>

<ul>
<?php foreach ($Topics as $t): ?>

	<li>

		<a href="<?php echo url_for('show_topic_messages', array('topic_id' => $t->getId())); ?>">
			<span class="f-title"><?php echo $t; ?></span>
			<em class="f-subtitle"><?php echo $t->getSubTitle(); ?></em>
		</a>

	</li>

<?php endforeach; ?>
</ul>

<?php if($sf_user->getGuardUser()->hasGroup('admin')): ?>

	<?php include_partial('form', array('form' => $form, 'new' => __('new Topic'))); ?>

<?php endif; ?>