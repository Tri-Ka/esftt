<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class scheduleDayActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
        $this->sDays = new sfDoctrinePager('ScheduleDay', sfConfig::get('app_pagination_max_item_admin'));
        $this->sDays->setPage($request->getParameter('page', 1));
        $this->sDays->init();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new ScheduleDayForm();

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'horaire créé');

            $this->redirect('schedule_day_list');
        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->sDay = ScheduleDayTable::getInstance()->find($request->getParameter('id'));

        $this->form = new ScheduleDayForm($this->sDay);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'horaire modifié');
            $this->redirect('schedule_day_list');
        }
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->sDay = ScheduleDayTable::getInstance()->find($request->getParameter('id'));
        $this->sDay->delete();
        $this->getUser()->setFlash('notice', 'horaire supprimée');
        $this->redirect('schedule_day_list');
    }
}
