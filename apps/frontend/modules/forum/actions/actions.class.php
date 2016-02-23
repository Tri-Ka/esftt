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

        $cookieName = 'esftt_newposts_'.$this->getUser()->getGuardUser()->getId();
        $newPostString = $this->getRequest()->getCookie($cookieName);
        $newPostArray = explode('-', $newPostString);
        unset($newPostArray[count($newPostArray) - 1]);

        $this->topicIdsWithNewPosts = array();
        if (0 < count($newPostArray)) {
            $this->topicsWithNewPosts = ForumTopicTable::getInstance()->findByPostIds($newPostArray);

            foreach ($this->topicsWithNewPosts as $topic) {
                $this->topicIdsWithNewPosts[] = $topic->getId();
            }
        }
    }

    public function executeTopic(sfWebRequest $request)
    {
        $this->topic = forumTopicTable::getInstance()->find($request->getParameter('id'));

        $cookieName = 'esftt_newposts_'.$this->getUser()->getGuardUser()->getId();
        $newPostString = $this->getRequest()->getCookie($cookieName);
        $newPostArray = explode('-', $newPostString);
        unset($newPostArray[count($newPostArray) - 1]);
        $str = '';
        if (0 < count($newPostArray)) {
            $topicWithNewPosts = ForumTopicTable::getInstance()->findByPostIds($newPostArray);
            foreach ($topicWithNewPosts as $topic) {
                if ($topic !== $this->topic) {
                    foreach ($topic->getPosts() as $post) {
                        $str = $str.$post->getId().'-';
                    }
                }
            }
        }

        $this->getResponse()->setCookie($cookieName, '',  time() - 3600, '/');
        $this->getResponse()->setCookie($cookieName, $str);

        $options = array(
            'author_id' => $this->getUser()->getGuardUser()->getId(),
            'topic_id' => $this->topic->getId(),
        );

        $this->form = new ForumPostFrontendForm(null, $options);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->redirect('topic', array('id' => $this->topic->getId()));
        }
    }

    public function executeTopicAdd(sfWebRequest $request)
    {
        $this->topic = new forumTopic();

        $this->topic->setTitle($request->getParameter('topic-name'));
        $this->topic->setAuthorId($this->getUser()->getGuardUser()->getId());
        $this->topic->setBigTopicId($request->getParameter('big-topic-id'));
        $this->topic->save();

        $this->redirect('topic', array('id' => $this->topic->getId()));
    }

    public function executePostDelete(sfWebRequest $request)
    {
        $post = forumPostTable::getInstance()->find($request->getParameter('id'));
        $topicId = $post->getTopicId();
        $post->delete();

        $this->redirect('topic', array('id' => $topicId));
    }
}
