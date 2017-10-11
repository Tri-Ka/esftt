<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class scheduleCatActions extends sfActions
{
    public function executeList(sfWebRequest $request)
    {
        $this->sCats = new sfDoctrinePager('ScheduleCategory', sfConfig::get('app_pagination_max_item_admin'));
        $this->sCats->setPage($request->getParameter('page', 1));
        $this->sCats->init();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new ScheduleCategoryForm();

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'categorie créé');

            $this->redirect('schedule_cat_list');
        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->article = ScheduleCategoryTable::getInstance()->find($request->getParameter('id'));

        $this->form = new ScheduleCategoryForm($this->article);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->getUser()->setFlash('notice', 'categorie modifié');
            $this->redirect('schedule_cat_list');
        }
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->article = ScheduleCategoryTable::getInstance()->find($request->getParameter('id'));
        $this->article->delete();
        $this->getUser()->setFlash('notice', 'categorie supprimée');
        $this->redirect('schedule_cat_list');
    }
}
