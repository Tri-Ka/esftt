<div class="col col-1-3">
  <h2>Liens</h2>
    <ul>
  		<?php foreach($links as $link): ?>      
      		<li><a href="<?php echo $link->url ?>" class="style8"><?php echo $link->title ?></a></li>
     	<?php endforeach ?>
    </ul>
</div>