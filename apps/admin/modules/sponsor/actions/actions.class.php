<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sponsorActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
        $this->sponsors = new sfDoctrinePager('Sponsor', sfConfig::get('app_pagination_max_item_admin'));
        $this->sponsors->setPage($request->getParameter('page', 1));
        $this->sponsors->init();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new SponsorForm();

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'sponsor créé');

            $this->redirect('sponsor_list');
        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->event = SponsorTable::getInstance()->find($request->getParameter('id'));

        $this->form = new SponsorForm($this->event);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'sponsor modifié');
            $this->redirect('sponsor_list');
        }
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->event = SponsorTable::getInstance()->find($request->getParameter('id'));
        $this->event->delete();
        $this->getUser()->setFlash('notice', 'sponsor supprimé');
        $this->redirect('sponsor_list');
    }
}
