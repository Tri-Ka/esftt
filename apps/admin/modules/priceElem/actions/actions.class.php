<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class priceElemActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
        $this->pElems = new sfDoctrinePager('PriceElement', sfConfig::get('app_pagination_max_item_admin'));
        $this->pElems->setPage($request->getParameter('page', 1));
        $this->pElems->init();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new PriceElementForm();

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'prix créé');

            $this->redirect('price_elem_list');
        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->pElem = PriceElementTable::getInstance()->find($request->getParameter('id'));

        $this->form = new PriceElementForm($this->pElem);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'prix modifié');
            $this->redirect('price_elem_list');
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
