
<div class="no-box-title text-center marged-bottom-2">
	<?php echo __('Pong'); ?>
</div>

<div class="box black pong">

	<div class="col-sm-6">
		<canvas id="myCanvas" width="500" height="500">  
		    <!-- Insert fallback content here -->  
		</canvas>   
	</div>

	<div class="col-sm-6">


		<div class="box-content">

			<div class="player-score">
				<span class="score-title">Score</span><span class="score-player">0</span>
			</div>
			<div class="info-player temp-pos">
				player <input type="text" maxlength="3" class="playername" data-url="<?php echo url_for('add_score'); ?>"> <span class="blink enter-name"><- enter name</span>
			</div>

			<div class="score-table">
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
			</div>

			<span class="game-over blink">game over</span>
			<a href="#" id="start-pong" class="hidden">start</a>

		</div>
	</div>


</div> 