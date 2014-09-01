<?php

require_once dirname(__FILE__).'/../lib/articleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/articleGeneratorHelper.class.php';

/**
 * article actions.
 *
 * @package    esftt
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends autoArticleActions
{
	public function executeNew(sfWebRequest $request)
    {
        $this->form = $this->configuration->getForm(
            null, array(
            'user' => $this->getUser(),
            )
        );
        $this->article = $this->form->getObject();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->form = $this->configuration->getForm(
            null, array(
            'user' => $this->getUser(),
            )
        );
        $this->article = $this->form->getObject();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->article = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm(
            $this->article, array(
            'user' => $this->getUser(),
            )
        );
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->article = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm(
            $this->article, array(
            'user' => $this->getUser(),
            )
        );

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }
}
