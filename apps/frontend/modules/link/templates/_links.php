<div class="col-md-4 text-left">
  <h2>Liens</h2>
    <ul>
  		<?php foreach($links as $link): ?>
      		<li><a href="http://<?php echo $link->getUrl(); ?>" class="style8"><?php echo $link->getTitle() ?></a></li>
     	<?php endforeach ?>
    </ul>
</div>