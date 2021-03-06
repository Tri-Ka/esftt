<?php if ($pager->haveToPaginate()): ?>
    <div class="pagination col-xs-12 text-center">
        <?php if (1 != $pager->getPage() && 2 != $pager->getPage()): ?>
            <a href="<?php echo $url; ?>?page=1" class="btn btn-xs btn-default first hvr-grow">
                <?php echo __('1') ?>
            </a>

            ...
        <?php endif; ?>

        <?php if ($pager->getPreviousPage() != $pager->getPage()): ?>
            <a href="<?php echo $url; ?>?page=<?php echo $pager->getPreviousPage() ?>" class="btn btn-xs btn-default  prev hvr-grow">
                <?php echo $pager->getPreviousPage(); ?>
            </a>
        <?php endif; ?>

        <a href="#" class="current btn btn-xs btn-primary">
            <?php echo $pager->getPage(); ?>
        </a>

        <?php if ($pager->getNextPage() != $pager->getPage()): ?>
            <a href="<?php echo $url; ?>?page=<?php echo $pager->getNextPage() ?>" class="btn btn-xs btn-default  next hvr-grow">
                <?php echo $pager->getNextPage(); ?>
            </a>
        <?php endif; ?>

        <?php if ($pager->getNextPage() != $pager->getLastPage() && ((int) $pager->getLastPage() - 1) != $pager->getNextPage()): ?>
            ...
        <?php endif; ?>

        <?php if ($pager->getLastPage() != $pager->getPage() && $pager->getNextPage() != $pager->getLastPage()): ?>
            <a href="<?php echo $url; ?>?page=<?php echo $pager->getLastPage() ?>" class="btn btn-xs btn-default  last hvr-grow">
                <?php echo $pager->getLastPage(); ?>
            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>
