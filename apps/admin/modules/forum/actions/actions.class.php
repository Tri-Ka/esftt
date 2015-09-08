<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class forumActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->bigTopics = forumBigTopicTable::getInstance()->findAll();
	}


	public function executeBigTopicNew(sfWebRequest $request)
	{
		$this->form = new ForumBigTopicForm();

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'topic général créé');

    		$this->redirect('forum');

    	}
	}

	public function executeBigTopicDelete(sfWebRequest $request)
    {
        $this->bigTopic = ForumBigTopicTable::getInstance()->find($request->getParameter('id'));
        $this->bigTopic->delete();
        $this->getUser()->setFlash('notice', 'topic supprimé');
        $this->redirect('forum');
    }


	public function executeBigTopicEdit(sfWebRequest $request)
    {
    	$this->bigTopic = ForumBigTopicTable::getInstance()->find($request->getParameter('id'));

    	$this->form = new ForumBigTopicForm($this->bigTopic);

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'topic modifié');
    		$this->redirect('forum');

    	}
    }

    public function executeBigTopicShow(sfWebRequest $request)
    {
    	$this->bigTopic = ForumBigTopicTable::getInstance()->find($request->getParameter('id'));
    }


    public function executeTopicNew(sfWebRequest $request)
	{
		
		$options = array(
			'author_id' => $this->getUser()->getGuardUser()->getId(),
			'big_topic_id' => $request->getParameter('bigTopicId')
		);

		$this->form = new TopicFrontendForm(null, $options);

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'topic créé');

    		$this->redirect('topic_show', array('id' => $this->form->getObject()->getId()));

    	}
	}

	public function executeTopicDelete(sfWebRequest $request)
    {
        $this->Topic = ForumTopicTable::getInstance()->find($request->getParameter('id'));
        $this->Topic->delete();
        $this->getUser()->setFlash('notice', 'topic supprimé');
        $this->redirect('forum');
    }


	public function executeTopicEdit(sfWebRequest $request)
    {
    	$this->Topic = ForumTopicTable::getInstance()->find($request->getParameter('id'));

    	$this->form = new ForumTopicForm($this->Topic);

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'topic modifié');
    		$this->redirect('forum');

    	}
    }

    public function executeTopicShow(sfWebRequest $request)
    {
		$this->topic = ForumTopicTable::getInstance()->find($request->getParameter('id'));
    }

    public function executePostNew(sfWebRequest $request)
	{
		$this->form = new ForumPostForm();

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'post créé');

    		$this->redirect('forum');

    	}
	}

	public function executePostDelete(sfWebRequest $request)
    {
        $this->post = ForumPostTable::getInstance()->find($request->getParameter('id'));
        $this->post->delete();
        $this->getUser()->setFlash('notice', 'post supprimé');
        $this->redirect('forum');
    }


	public function executePostEdit(sfWebRequest $request)
    {
    	$this->post = ForumPostTable::getInstance()->find($request->getParameter('id'));

    	$this->form = new ForumPostForm($this->post);

    	if ($this->form->bindAndValid($request)) {

    		$this->form->save();
            $this->getUser()->setFlash('notice', 'post modifié');
    		$this->redirect('forum');

    	}
    }


}
