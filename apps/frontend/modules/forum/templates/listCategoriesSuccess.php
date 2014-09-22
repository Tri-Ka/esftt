<h2><?php echo __('Forum'); ?></h2>

<ul>
	<?php foreach ($categories as $c): ?>

		<li>

			<a href="<?php echo url_for('show_big_topics', array('cat_id' => $c->getId())); ?>">

				<span class="f-title"><?php echo $c; ?></span>
				<em class="f-subtitle"><?php echo $c->getSubTitle(); ?></em>

			</a>

		</li>

	<?php endforeach; ?>
</ul>

<?php if($sf_user->getGuardUser()->hasGroup('admin')): ?>

	<?php include_partial('form', array('form' => $form, 'new' => __('new Category'))); ?>

<?php endif; ?>