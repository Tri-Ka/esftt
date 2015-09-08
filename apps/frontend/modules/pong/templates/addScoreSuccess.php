<table>
	<thead>
		<tr>
			<th>players</th>
			<th>scores</th>
		</tr>
	</thead>
	<tbody>
		
		<?php foreach ($bestScores as $score): ?>
			<tr>
				<td><?php echo $score->getPlayername(); ?></td>
				<td><?php echo $score->getScore(); ?></td>
			</tr>	
		<?php endforeach; ?>
		
	</tbody>
</table>