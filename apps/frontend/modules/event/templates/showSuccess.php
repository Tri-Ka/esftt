 <div class="row equalized">

    <?php include_partial('homepage/menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">

        <div class="box article marged-top">

         	<div class="col-xs-12">
         		<div class="news-title">
         			<?php echo $event->getName(); ?>
         		</div>
         	</div>

            <div class="col-xs-12 col-sm-6 img-cont marged-bottom">

                <img class="thumbnail" src="<?php echo $event->retrievePictureUrl(); ?>">

            </div>

            <div class="col-xs-12 col-sm-6">
            	<div class="row">
                    
                    <div class="col-xs-12 info-dates">
                        <div class="title-horaire"><i class="fa fa-clock-o"></i> horaires</div>
                        <?php setlocale(LC_TIME, "fr_FR"); ?>
                        <span class="info-date date-from"><?php echo date('l j F o', strtotime($event->getDateFrom())); ?> <b>à</b> <?php echo date('H:i', strtotime($event->getDateFrom())); ?></span>
                        <span class="info-date date-to"><?php echo date('l j F o', strtotime($event->getDateTo())); ?> <b>à</b> <?php echo date('H:i', strtotime($event->getDateTo())); ?></span>
                    </div>

                	<div class="col-xs-12"><?php echo $event->getDescription(ESC_RAW); ?></div>
                </div>
            </div>

            
            <div class="col-xs-12">
                <div id="disqus_thread"></div>
            </div>

        </div>
    </div>

</div>
