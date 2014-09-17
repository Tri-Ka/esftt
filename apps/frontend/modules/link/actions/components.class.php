<?php

class linkComponents extends sfComponents
{
  public function executeLinks()
  {
    // $this->links = Doctrine::getTable('link')
    //   ->createQuery('a')
    //   ->execute();

    $this->links = LinkTable::getInstance()->findAll();
  }
}