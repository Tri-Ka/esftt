<?php

/**
 * Topic form.
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TopicFrontendForm extends TopicForm
{
  public function configure()
  {

  		unset($this['created_at'], $this['updated_at']);

  		$this->widgetSchema['author_id'] = new sfWidgetFormInputHidden();
  		$this->widgetSchema['big_topic_id'] = new sfWidgetFormInputHidden();

		$this->setDefault('author_id', $this->getOption('author_id'));
		$this->setDefault('big_topic_id', $this->getOption('big_topic_id'));

		$this->widgetSchema->setFormFormatterName('BootstrapForm');

  }
}
