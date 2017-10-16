<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class infoElemActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
        $this->iElems = new sfDoctrinePager('InfoElement', sfConfig::get('app_pagination_max_item_admin'));
        $this->iElems->setPage($request->getParameter('page', 1));
        $this->iElems->init();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new InfoElementForm();

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'info créé');

            $this->redirect('info_elem_list');
        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->pElem = InfoElementTable::getInstance()->find($request->getParameter('id'));

        $this->form = new InfoElementForm($this->pElem);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'info modifié');
            $this->redirect('info_elem_list');
        }
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->sDay = InfoElementTable::getInstance()->find($request->getParameter('id'));
        $this->sDay->delete();
        $this->getUser()->setFlash('notice', 'info supprimée');
        $this->redirect('info_elem_list');
    }
}
