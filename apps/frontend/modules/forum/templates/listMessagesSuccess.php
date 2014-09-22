<h2><?php echo __($topic); ?></h2>

<ul>
<?php foreach ($Messages as $m): ?>

	<li>

		<?php echo $m->getMessage(); ?>

	</li>

<?php endforeach; ?>

</ul>

<form action="">

	<?php echo $form; ?>

	<input type="submit" class="btn" value="<?php echo __('valid'); ?>">

</form>

