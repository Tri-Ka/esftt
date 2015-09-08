<?php

/**
 * ForumTopic form.
 *
 * @author     Your name here
 *
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ForumTopicForm extends BaseForumTopicForm
{
    public function configure()
    {
        $this->useFields(array('author_id', 'big_topic_id', 'title'));
    }
}
