<?php
 
class infoComponents extends sfComponents
{
  public function executeInfos()
  {
    $infos = Doctrine::getTable('info')
      ->createQuery('a')
      ->execute();

    $this->info = $infos[0];
  }
}