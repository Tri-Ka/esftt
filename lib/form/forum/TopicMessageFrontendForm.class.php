<?php

/**
 * TopicMessage form.
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TopicMessageFrontendForm extends TopicMessageForm
{
  public function configure()
  {
  	  	unset($this['created_at'], $this['updated_at']);

  		$this->widgetSchema['author_id'] = new sfWidgetFormInputHidden();
  		$this->widgetSchema['topic_id'] = new sfWidgetFormInputHidden();

		$this->setDefault('author_id', $this->getOption('author_id'));
		$this->setDefault('topic_id', $this->getOption('topic_id'));

		$this->widgetSchema->setFormFormatterName('BootstrapForm');

  }
}
