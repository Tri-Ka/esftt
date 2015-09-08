<?php slot('page_title', $event->getName()); ?>
<?php slot('page_image', $event->retrievePictureUrl()); ?>
<?php slot('page_url', url_for('event_show', array('id' => $event->getId()), true)); ?>
<?php slot('page_description', $event->getDescription()); ?>

 <div class="row equalized">

    <?php include_partial('homepage/menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">

        <div class="article marged-top">

         	<div class="box col-xs-12 marged-top marged-bottom-2">
         		<div class="news-title no-marg">
         			<?php echo $event->getName(); ?>
         		</div>
         	</div>

            <div class="col-xs-12 col-sm-6 img-cont marged-bottom no-pad shadowed">

                <img class="thumbnail" src="<?php echo $event->retrievePictureUrl(); ?>">

            </div>

            <div class="col-xs-12 col-sm-6 no-pad-right">
                    
                <div class="col-xs-12 info-dates">
                    <div class="skotch"></div>

                    <span class="info-date date-from"><i class="fa fa-clock-o"></i> démare le<br><strong><?php echo format_date($event->getDateFrom(), 'D'); ?></strong> à <strong><?php echo date('H:i', strtotime($event->getDateFrom())); ?></strong></span><br><br>
                    <?php if (strtotime($event->getDateTo())): ?>
                        <span class="info-date date-from"><i class="fa fa-clock-o"></i> termine le<br><strong><?php echo format_date($event->getDateTo(), 'D'); ?></strong> à <strong><?php echo date('H:i', strtotime($event->getDateTo())); ?></strong></span>
                    <?php endif; ?>
                </div>

            	<div class="box col-xs-12 marged-bottom">
                    <div class="box-title marged-bottom">
                        <?php echo __('A propos'); ?>
                    </div>
                    <?php echo $event->getDescription(ESC_RAW); ?>
                </div>

            </div>
            
            <div class="col-xs-12 box">
                <div class="box-content">

                    <div
                        class="fb-like"
                        data-share="true"
                        data-width="450"
                        data-show-faces="true">
                    </div>

                    <div id="disqus_thread"></div>
                </div>
            </div>

        </div>
    </div>

</div>
