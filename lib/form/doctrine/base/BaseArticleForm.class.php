<?php

/**
 * Article form base class.
 *
 * @method Article getObject() Returns the current form's model object
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArticleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'title'             => new sfWidgetFormInputText(),
      'short_description' => new sfWidgetFormInputText(),
      'content'           => new sfWidgetFormTextarea(),
      'picture'           => new sfWidgetFormInputText(),
      'is_published'      => new sfWidgetFormInputCheckbox(),
      'published_at'      => new sfWidgetFormDateTime(),
      'author_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'keywords_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Keyword')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'             => new sfValidatorString(array('max_length' => 255)),
      'short_description' => new sfValidatorString(array('max_length' => 255)),
      'content'           => new sfValidatorString(),
      'picture'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_published'      => new sfValidatorBoolean(array('required' => false)),
      'published_at'      => new sfValidatorDateTime(),
      'author_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'keywords_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Keyword', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['keywords_list']))
    {
      $this->setDefault('keywords_list', $this->object->Keywords->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveKeywordsList($con);

    parent::doSave($con);
  }

  public function saveKeywordsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['keywords_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Keywords->getPrimaryKeys();
    $values = $this->getValue('keywords_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Keywords', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Keywords', array_values($link));
    }
  }

}
