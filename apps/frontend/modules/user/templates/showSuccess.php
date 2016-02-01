<div class="row">
	<div class="col-xs-12">
		<div class="row">
		<?php if (false == isset($infosJoueur)): ?>
			<div class="col-xs-12 col-sm-4 col-sm-offset-4 marged-bottom">
		<?php else: ?>
			<div class="col-xs-12 col-sm-4 col-md-3 marged-bottom">
		<?php endif; ?>
				<div class="box text-center">
					<div class="box-title">

						<?php echo $user->getUsername(); ?>

					</div>
					<div class="box-content marged-top">
						<div class="col-xs-12 marged-bottom">
							<img class="img-thumbnail img-circle" src="<?php echo $user->retrievePictureUrl(); ?>">
						</div>
						<strong><?php echo $user->getLastName(); ?></strong><br>
						<?php echo $user->getFirstName(); ?>
					</div>
				</div>
			</div>

			<?php if (isset($infosJoueur)): ?>

				<div class="col-xs-12 col-sm-8 col-md-9">
					<div class="box">
						<div class="box-title">

							<?php echo __('Informations'); ?><img src="<?php echo public_path('images/fftt.jpg'); ?>" height="45px">

						</div>
						<div class="box-content marged-top">
							<table class="table table-bordered table-striped table-hover text-center">							
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">Catégorie</th>
										<th class="text-center">Points<br>(mensuel)</th>
										<th class="text-center">Points<br>(licence)</th>
										<th class="text-center">Classement<br>(en cours)</th>
										<th class="text-center">Rang régional</th>
										<th class="text-center">Rang départemental</th>
										<th class="text-center">Progression (mois)</th>
										<th class="text-center">Progression (année)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $infosJoueur['licence']; ?></td>
										<td><?php echo $infosJoueur['categ']; ?></td>
										<td><?php echo $infosJoueur['apoint']; ?></td>
										<td><?php echo $infosJoueur['valcla']; ?></td>
										<td><?php echo $infosJoueur['clast']; ?></td>
										<td><?php echo $infosJoueur['rangreg']; ?></td>
										<td><?php echo $infosJoueur['rangdep']; ?></td>
										<td class="<?php echo 0 >= $infosJoueur['progmois'] ? 'red' : 'green'; ?>"><?php echo $infosJoueur['progmois']; ?></td>
										<td class="<?php echo 0 >= $infosJoueur['progann'] ? 'red' : 'green'; ?>"><?php echo $infosJoueur['progann']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="box marged-top">
						<div class="box-title">

							<?php echo __('Derniers matchs'); ?><img src="<?php echo public_path('images/fftt.jpg'); ?>" height="45px">

						</div>
						<div class="box-content marged-top">
							<div class="row">
								<div class="col-xs-12 col-sm-8 col-sm-9">
									<table class="table table-bordered table-striped table-hover text-center">
										<thead>
											<tr>
												<th class="text-center">Parties disputées</th>
												<th class="text-center">Victoires</th>
												<th class="text-center">Défaites</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo count($infosParties); ?></td>
												<td><?php echo $ratioVic; ?>%</td>
												<td><?php echo $ratioDef; ?>%</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-xs-12 col-sm-4 col-sm-3 pie-chart-box">
									<div id="pie-chart" style="height: 150px;" data-stats="<?php echo $pieChart; ?>"></div>
								</div>
							</div>

							<table class="table table-bordered table-striped table-hover text-center">
								<thead>
									<tr>
										<th rowspan="2" class="text-center">#</th>
										<th rowspan="2" class="text-center">Victoire / Défaite</th>
										<th rowspan="2" class="text-center">Date</th>
										<th rowspan="1" colspan="2" class="text-center">Adversaire</th>
										<th rowspan="1" colspan="3" class="text-center">Epreuve</th>
										<th rowspan="2" class="text-center">Gain / Perte</th>
									</tr>
									<tr>
										<th>Nom & Prénom</th>
										<th>Classement officiel</th>
										<th>N° de journée</th>
										<th>Code</th>
										<th>Coefficient</th>
									</tr>
								</thead>
								<tbody>

									<?php foreach ($infosParties as $k => $infosPartie): ?>
										
										<tr>
											<td class="text-center"><?php echo $k+1; ?></td>
											<td class="text-center <?php echo 'D' == $infosPartie['vd'] ? 'red' : 'green'; ?>"><?php echo $infosPartie['vd']; ?></td>
											<td class="text-center"><?php echo $infosPartie['date']; ?></td>
											<td class="text-center"><?php echo $infosPartie['advnompre']; ?></td>
											<td class="text-center"><?php echo $infosPartie['advclaof']; ?></td>
											<td class="text-center"><?php echo is_string($infosPartie['numjourn']) ? $infosPartie['numjourn'] : 'N/A' ?></td>
											<td class="text-center"><?php echo $infosPartie['codechamp']; ?></td>
											<td class="text-center"><?php echo $infosPartie['coefchamp']; ?></td>
											<td class="text-center <?php echo 0 > $infosPartie['pointres'] ? 'red' : 'green'; ?>"><?php echo $infosPartie['pointres']; ?></td>
										</tr>

									<?php endforeach; ?>

								</tbody>
							</table>
							<div id="myfirstchart" style="height: 250px;" data-stats="<?php echo $arrayStatsGlobJson; ?>" data-max="<?php echo $maxVal; ?>" data-min="<?php echo $minVal; ?>"></div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>