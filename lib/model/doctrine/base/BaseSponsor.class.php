<?php

/**
 * BaseSponsor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $link
 * @property string $picture
 * 
 * @method string  getName()    Returns the current record's "name" value
 * @method string  getLink()    Returns the current record's "link" value
 * @method string  getPicture() Returns the current record's "picture" value
 * @method Sponsor setName()    Sets the current record's "name" value
 * @method Sponsor setLink()    Sets the current record's "link" value
 * @method Sponsor setPicture() Sets the current record's "picture" value
 * 
 * @package    esftt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSponsor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sponsor');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('link', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('picture', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}