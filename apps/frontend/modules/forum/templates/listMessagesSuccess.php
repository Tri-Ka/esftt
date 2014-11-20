<section class="col-md-8">
<h2><?php echo __($topic); ?></h2>

	<div class="folded">

		<ul>
		<?php foreach ($Messages as $m): ?>

			<li>

				<?php echo $m->getMessage(); ?>

			</li>

		<?php endforeach; ?>

		</ul>

		<form class="form" action="">

			<?php echo $form; ?>

			<input type="submit" class="btn" value="<?php echo __('valid'); ?>">

		</form>

	</div>

</section>

