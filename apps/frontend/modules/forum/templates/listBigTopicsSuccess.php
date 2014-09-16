<ul>
<?php foreach ($bigTopics as $bt): ?>

	<li>

		<a href="<?php echo url_for('show_topics', array('big_topic_id' => $bt->getId())); ?>"><?php echo $bt; ?></a>

	</li>

<?php endforeach; ?>
</ul>

<form action="" method="post">

	<?php echo $form; ?>

	<input type="submit" value="valider">

</form>