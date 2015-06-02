<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
    	$this->events = new sfDoctrinePager('Event', sfConfig::get('app_pagination_max_item_admin'));
		$this->events->setPage($request->getParameter('page', 1));
		$this->events->init();
    }

    public function executeNew(sfWebRequest $request)
    {
    	$this->form = new EventForm();

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'évènement créé');

    		$this->redirect('event_list');

    	}
    }

	public function executeEdit(sfWebRequest $request)
    {
    	$this->event = EventTable::getInstance()->find($request->getParameter('id'));

    	$this->form = new EventForm($this->event);

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'évènement modifié');
    		$this->redirect('event_list');

    	}
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->event = EventTable::getInstance()->find($request->getParameter('id'));
        $this->event->delete();
        $this->getUser()->setFlash('notice', 'évènement supprimé');
        $this->redirect('event_list');
    }
}
