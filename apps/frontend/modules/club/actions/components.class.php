<?php

class clubComponents extends sfComponents
{
    public function executeHoraires(sfWebRequest $request)
    {
        $this->sCats = scheduleCategoryTable::getInstance()->findOrdered();
    }

    public function executePrices(sfWebRequest $request)
    {
        $this->pCats = PriceCategoryTable::getInstance()->findOrdered();
    }
}
