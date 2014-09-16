<ul>
<?php foreach ($Topics as $t): ?>

	<li>

		<a href="<?php echo url_for('show_topic_messages', array('topic_id' => $t->getId())); ?>"><?php echo $t; ?></a>

	</li>

<?php endforeach; ?>
</ul>

<form action="" method="post">

	<?php echo $form; ?>

	<input type="submit" value="valider">

</form>