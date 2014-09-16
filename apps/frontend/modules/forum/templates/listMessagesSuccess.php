<ul>
<?php foreach ($Messages as $m): ?>

	<li>

		<?php echo $m->getMessage(); ?>

	</li>

<?php endforeach; ?>

</ul>

<form action="" method="post">

	<?php echo $form; ?>

	<input type="submit" value="valider">

</form>