 <div class="row equalized">

    <?php include_partial('homepage/menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">

        <div class="article marged-top">

         	<div class="box col-xs-12 marged-top marged-bottom-2">
         		<div class="news-title no-marg">
         			<?php echo $event->getName(); ?>
         		</div>
         	</div>

            <div class="col-xs-12 col-sm-6 img-cont marged-bottom no-pad">

                <img class="thumbnail" src="<?php echo $event->retrievePictureUrl(); ?>">

            </div>

            <div class="col-xs-12 col-sm-6 no-pad-right">
                    
                <div class="col-xs-12 info-dates">
                    <div class="skotch"></div>

                    <span class="info-date date-from"><i class="fa fa-clock-o"></i> <strong>démare le</strong><br> <?php echo format_date($event->getDateFrom(), 'D'); ?> <b>à</b> <?php echo date('H:i', strtotime($event->getDateFrom())); ?></span><br><br>
                    <span class="info-date date-to"><i class="fa fa-clock-o"></i> <strong>termine le</strong><br> <?php echo format_date($event->getDateTo(), 'D'); ?> <b>à</b> <?php echo date('H:i', strtotime($event->getDateTo())); ?></span>
                </div>

            	<div class="box col-xs-12 marged-bottom"><?php echo $event->getDescription(ESC_RAW); ?></div>
            </div>

            
            <div class="col-xs-12 box">
                <div class="box-content">
                    <div id="disqus_thread"></div>
                </div>
            </div>

        </div>
    </div>

</div>
