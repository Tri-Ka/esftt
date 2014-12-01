<?php

/**
 * forum actions.
 *
 * @package    esftt
 * @subpackage homepage
 * @author     Etienne atcharry <datcharrye@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class forumActions extends sfActions
{

	public function executeListCategories(sfWebRequest $request){

		$this->categories = BigTopicCategoryTable::getInstance()->findAll();
		$this->form = new BigTopicCategoryFrontendForm();

		if ($this->form->bindAndValid($request)) {

            $user = $this->form->save();
            $this->redirect('forum');

        }

        $this->formBigTopic = new BigTopicFrontendForm();

        if ($this->formBigTopic->bindAndValid($request)) {

            $user = $this->formBigTopic->save();
            $this->redirect('forum');

        }

	}

	public function executeListBigTopics(sfWebRequest $request){

		$this->bigTopics = BigTopicTable::getInstance()->findByCategoryId($request->getParameter('cat_id'));
		$this->category = BigtopicCategoryTable::getInstance()->find($request->getParameter('cat_id'));

		$this->form = new BigTopicFrontendForm(
			null,
			array(
				'category_id' => $request->getParameter('cat_id')
			)
		);

		if ($this->form->bindAndValid($request)) {

            $user = $this->form->save();
            $this->redirect('show_big_topics', array('cat_id' => $request->getParameter('cat_id')));

        }

	}

	public function executeListTopics(sfWebRequest $request){

		$this->Topics = TopicTable::getInstance()->findByBigTopicId($request->getParameter('big_topic_id'));
		$this->bigTopic = BigTopicTable::getInstance()->find($request->getParameter('big_topic_id'));

		$this->form = new TopicFrontendForm(
			null,
			array(
				'author_id' => $this->getUser()->getGuardUser()->getId(),
				'big_topic_id' => $request->getParameter('big_topic_id')
			)
		);

		if ($this->form->bindAndValid($request)) {

            $user = $this->form->save();
            $this->redirect('show_topics', array('big_topic_id' => $request->getParameter('big_topic_id')));

        }

	}

	public function executeListMessages(sfWebRequest $request){

		$this->Messages = TopicMessageTable::getInstance()->findByTopicId($request->getParameter('topic_id'));
		$this->topic = TopicTable::getInstance()->find($request->getParameter('topic_id'));

		$this->form = new TopicMessageFrontendForm(
			null,
			array(
				'author_id' => $this->getUser()->getGuardUser()->getId(),
				'topic_id' => $request->getParameter('topic_id')
			)
		);

		if ($this->form->bindAndValid($request)) {

            $user = $this->form->save();
            $this->redirect('show_topic_messages', array('topic_id' => $request->getParameter('topic_id')));

        }

	}

}
