<?php

class articleComponents extends sfComponents
{
    public function executeList()
    {
        $this->articles = ArticleTable::getInstance()->findAll();
    }

}
