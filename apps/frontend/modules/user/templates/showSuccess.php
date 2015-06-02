<div class="row">

	<div class="col-xs-12">

		<div class="row">

			<div class="col-xs-12 col-sm-4 col-md-3">

				<div class="box text-center">

					<div class="box-title">

						<?php echo $user->getUsername(); ?>

					</div>

					<div class="box-content marged-top">
						<div class="col-xs-12 marged-bottom">
							<img class="img-thumbnail img-circle" src="<?php echo $user->retrievePictureUrl(true, true); ?>">
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

							<?php echo __('Informations FFTT'); ?>

						</div>

						<div class="box-content marged-top">

							<table class="table table-bordered table-striped table-hover text-center">
								
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th>Catégorie</th>
										<th>Points</th>
										<th>Rang regional</th>
										<th>Rang départemental</th>
										<th>Progression (moi)</th>
										<th>Progression (année)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $infosJoueur['licence']; ?></td>
										<td><?php echo $infosJoueur['categ']; ?></td>
										<td><?php echo $infosJoueur['point']; ?></td>
										<td><?php echo $infosJoueur['rangreg']; ?></td>
										<td><?php echo $infosJoueur['rangdep']; ?></td>
										<td class="<?php echo 0 >= $infosJoueur['progmois'] ? 'red' : 'green'; ?>"><?php echo $infosJoueur['progmois']; ?></td>
										<td class="<?php echo 0 >= $infosJoueur['progann'] ? 'red' : 'green'; ?>"><?php echo $infosJoueur['progann']; ?></td>
									</tr>
								</tbody>

							</table>

							<?php //var_dump($infosJoueur); ?>

						</div>

					</div>

				</div>

			<?php endif; ?>

		</div>

	</div>

</div>