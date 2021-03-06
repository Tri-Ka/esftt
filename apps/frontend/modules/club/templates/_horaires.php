<div class="box marged-top">
	<div class="box-title">
		Horaires
	</div>

	<div class="box-content">
		<?php foreach ($sCats as $cat): ?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th colspan="3"><?php echo $cat; ?></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($cat->getDays() as $day): ?>
						<tr>
							<td><?php echo $day->getDay(); ?></td><td class="text-right"><?php echo $day->getInfo(); ?></td><td class="text-right"><?php echo $day->getHours(); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endforeach; ?>
	</div>
</div>
