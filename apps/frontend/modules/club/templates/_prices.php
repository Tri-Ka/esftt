<div class="box marged-top">
	<div class="box-title">
		Tarifs
	</div>

	<div class="box-content">
		<?php foreach ($pCats as $cat): ?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th colspan="3"><?php echo $cat; ?></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($cat->getPrices() as $price): ?>
						<tr>
							<td><?php echo $price->getElement(); ?></td><td class="text-right"><?php echo $price->getInfo(); ?></td><td class="text-right"><?php echo $price->getPrice(); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endforeach; ?>
	</div>
</div>
