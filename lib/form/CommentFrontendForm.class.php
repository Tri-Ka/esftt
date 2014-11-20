<?php

/**
 * Comment form.
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentFrontendForm extends CommentForm
{
  public function configure()
  {

  	$this->useFields(array('author_id', 'article_id', 'content'));

  	$this->widgetSchema['author_id'] = new sfWidgetFormInputHidden();
  	$this->validatorSchema['author_id'] = new sfValidatorPass();
  	$this->widgetSchema['author_id']->setDefault($this->getOption('user')->getId());

  	$this->widgetSchema['article_id'] = new sfWidgetFormInputHidden();
  	$this->validatorSchema['article_id'] = new sfValidatorPass();
  	$this->widgetSchema['article_id']->setDefault($this->getOption('article_id'));

  	$this->setDefault('author_id', $this->getOption('user')->getId());
  	$this->setDefault('article_id', $this->getOption('article_id'));

    $this->widgetSchema->setFormFormatterName('BootstrapForm');

  }
}
