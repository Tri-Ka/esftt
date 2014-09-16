<ul>
<?php foreach ($categories as $c): ?>

	<li>

		<a href="<?php echo url_for('show_big_topics', array('cat_id' => $c->getId())); ?>"><?php echo $c; ?></a>

	</li>

<?php endforeach; ?>
</ul>

<form action="" method="post">

	<?php echo $form; ?>

	<input type="submit" value="valider">

</form>