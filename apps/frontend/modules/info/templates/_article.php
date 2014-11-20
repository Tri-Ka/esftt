<div class="info-list">
	<h4><?php echo $article->getTitle(); ?></h4>
	<?php echo $article->getContent(ESC_RAW); ?>

	<?php if('Salle' === $article->getTitle()): ?>

		<iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2619.626914940686!2d2.181318400000004!3d48.96058950000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6613887156c0b%3A0x3f8f94d931042175!2s2+Avenue+des+Lilas%2C+95530+La+Frette-sur-Seine!5e0!3m2!1sfr!2sfr!4v1416429889260" width="50%" height="250" frameborder="0"></iframe>
		<iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m0!4v1416430060718!6m8!1m7!1s64kro5aPLBAYExP2nveOqQ!2m2!1d48.96560996782365!2d2.181984450515401!3f266.18292142152654!4f-0.17849686667628362!5f0.4000000000000002" width="50%" height="250" frameborder="0"></iframe>

	<?php endif; ?>

</div>