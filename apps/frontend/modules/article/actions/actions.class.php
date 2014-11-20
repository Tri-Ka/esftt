<?php

/**
 * article actions.
 *
 * @package    esftt
 * @subpackage homepage
 * @author     Etienne atcharry <datcharrye@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends sfActions
{

	public function executeShow(sfWebRequest $request)
	{
		$this->forward404Unless($this->article = ArticleTable::getInstance()->find($request->getParameter('id')));

		if($this->getUser()->isAuthenticated()){

			$options = array(
				'user' => $this->getUser()->getGuardUser(),
				'article_id' => $request->getParameter('id')
			);

			$this->commentForm = new CommentFrontendForm(null, $options);

			if ($this->commentForm->bindAndValid($request)) {

				$this->commentForm->save();

				$this->redirect('article_show', array('id' => $request->getParameter('id')));

			}


		}

	}

	public function executeNewComment(sfWebRequest $request)
	{

		if($this->getUser()->isAuthenticated()){

			$c = $request->getParameter('comment');

			$options = array(
				'user' => $this->getUser()->getGuardUser(),
				'article_id' => $c['article_id']
			);

			$this->commentForm = new CommentFrontendForm(null, $options);

			if ($this->commentForm->bindAndValid($request)) {

				$this->comment = $this->commentForm->save();

			}

			$this->redirect('article_show', array('id' => $c['article_id']));

		}
	}

	public function executeShowInformations(sfWebRequest $request)
	{
		$this->article = ArticleTable::getInstance()->findOneByKeyword('informations');
	}

}