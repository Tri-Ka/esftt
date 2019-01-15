<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clubActions extends sfActions
{
    public function executeShow(sfWebRequest $request)
    {
        $this->teams = TeamTable::getInstance()->findAllOrdered()->execute();
        $this->eventsToCome = EventTable::getInstance()->findToCome();
        $this->eventsPassed = EventTable::getInstance()->findPassed();

        // $apiId = 'SW405';
        // $apiPwd = 'd7ZG56dQKf';

        // $api = new ffttService2($apiId, $apiPwd);
        // $api->setSerial(ffttService2::generateSerial());
        // $api->initialization();

        // $this->infosClub = $api->getClub('08951331');
        // $this->teamClub = $api->getEquipesByClub('08951331');

        // var_dump($this->infosClub, $this->teamClub);
        // exit;
    }

    public function executeInfo(sfWebRequest $request)
    {
    }
}
