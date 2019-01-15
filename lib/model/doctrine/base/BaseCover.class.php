<?php

/**
 * BaseCover
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $file_name
 * @property integer $position
 * 
 * @method string  getFileName()  Returns the current record's "file_name" value
 * @method integer getPosition()  Returns the current record's "position" value
 * @method Cover   setFileName()  Sets the current record's "file_name" value
 * @method Cover   setPosition()  Sets the current record's "position" value
 * 
 * @package    esftt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCover extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cover');
        $this->hasColumn('file_name', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('position', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}