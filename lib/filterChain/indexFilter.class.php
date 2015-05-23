<?php

class indexFilter extends sfFilter
{
    public function execute($filterChain)
    {
        $this->context->getUser()->setCulture('fr');
        $filterChain->execute();
    }
}
