 <div class="row">

    <?php include_partial('homepage/menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">

        <div class="box article marged-top">

             	<div class="col-xs-12">
             		<div class="date">
            	 		<span class="day"><?php echo date('d', strtotime($article->getCreatedAt())); ?></span>
            	 		<span class="month"><?php echo __(date('M', strtotime($article->getCreatedAt()))); ?></span>
            	 		<!-- <span class="year">2015</span> -->
             		</div>
             		<div class="news-title">
             			<?php echo $article->getTitle(); ?>
             		</div>
             	</div>

                <?php if (null !== $article->getPicture()): ?>

                    <div class="col-xs-12 img-cont marged-bottom">

                        <img class="thumbnail" src="<?php echo $article->retrievePictureUrl(); ?>">

                    </div>

                    <div class="col-xs-12">
                    	<div class="row">
                    		<div class="col-xs-12"><strong><?php echo $article->getSubTitle(); ?></strong></div>
                        	<div class="col-xs-12"><?php echo $article->getContent(ESC_RAW); ?></div>
                        </div>

                    </div>

                <?php else: ?>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12"><strong><?php echo $article->getSubTitle(); ?></strong></div>
                            <div class="col-xs-12"><?php echo nl2br($article->getContent()); ?></div>
                        </div>

                    </div>

                <?php endif; ?>

        </div>
    </div>

</div>
