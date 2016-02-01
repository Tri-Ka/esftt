<?php slot('page_title', $article->getTitle()); ?>
<?php slot('page_image', $article->retrievePictureUrl()); ?>
<?php slot('page_url', url_for('article_show', array('id' => $article->getId()), true)); ?>
<?php slot('page_description', $article->getSubTitle()); ?>

 <div class="row">

    <?php include_partial('homepage/menuLeft'); ?>

    <div class="col-xs-12 col-sm-8">

        <div class="no-box-title text-center">
            <?php echo __('News'); ?>
        </div>

        <div class="box article">

         	<div class="col-xs-12 title-part">
                <div class="row">
                    <div class="col-xs-12 article-title">
                        <div class="article-title-left">
                     		<div class="date">
                    	 		<span class="day"><?php echo date('d', strtotime($article->getCreatedAt())); ?></span>
                    	 		<span class="month"><?php echo __(date('M', strtotime($article->getCreatedAt()))); ?></span>
                    	 		<!-- <span class="year">2015</span> -->
                     		</div>
                        </div>
                        <div class="article-title-right">
                     		<div class="news-title">
                     			<?php echo $article->getTitle(); ?>
                     		</div>
                        </div>
                    </div>
                </div>
         	</div>

            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 pitch"><strong><?php echo $article->getSubTitle(); ?></strong></div>
                </div>
            </div>

            <?php if (null !== $article->getPicture()): ?>

                <div class="col-xs-12 img-cont marged-bottom">

                    <img class="thumbnail" src="<?php echo $article->retrievePictureUrl(); ?>">

                </div>

            <?php endif; ?>

            <div class="col-xs-12 marged-top">

                <div class="col-xs-12 content"><?php echo $article->getContent(ESC_RAW); ?></div>

                <div
                    class="fb-like"
                    data-share="true"
                    data-width="450"
                    data-show-faces="true">
                </div>

            </div>

            <div class="col-xs-12">
                <div class="fb-comments" data-href="<?php echo url_for('article_show', array('id' => $article->getId()), true); ?>" data-width="100%" data-numposts="10"></div>
            </div>

        </div>
    </div>

</div>
