<?php

/**
 * CmsArticle form.
 *
 * @package    orange_ooi
 * @subpackage form
 * @author     Denis Fingonnet <denis.fingonnet@popsiit.net>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleBackendForm extends BaseArticleForm
{

    public function configure()
    {
        $this->useFields(array('title', 'short_description', 'content', 'is_published', 'picture'));


        $this->widgetSchema['published_at'] = new sfWidgetFormDateTime(array(
        	'date' => array(
        		'format' => '%day%/%month%/%year%'
        	)
        ));

        $this->setDefault('published_at', time());

        $this->validatorSchema['published_at'] = new sfValidatorDateTime(array('required' => true));


        // picture

        $this->widgetSchema['picture'] = new sfWidgetFormInputFileEditable(array(
          'file_src' => $this->getObject()->retrievePictureUrl(),
          'is_image' => true,
          'edit_mode' => !$this->isNew() && null != $this->getObject()->getPicture(),
        ));

        $this->validatorSchema['picture'] = new sfValidatorFileImage(array(
            'required'   => false,
            'path'       => sfConfig::get('sf_upload_dir').'/articles',
            'min_height' =>  0,
            'min_width'  =>  0,
            'max_height' =>  99999999,
            'max_width'  =>  99999999,
            'mime_types' => 'web_images',
        ));

        $this->validatorSchema['picture_delete'] = new sfValidatorBoolean();
        $this->widgetSchema['content']->setAttribute('class', 'tinymce');
        $this->widgetSchema['short_description'] = new sfWidgetFormTextarea();

        $this->widgetSchema['author_id'] = new sfWidgetFormInputHidden();
        $this->setDefault('author_id', (int) $this->getOption('user')->getGuardUser()->getId());
        $this->validatorSchema['author_id'] = new sfValidatorPass();

    }

    /**
     * @see sfFormObject
     */
    public function doSave($con = null)
    {

        parent::doSave($con);

        $article = $this->getObject();

        $directory = $article->retrieveHashedPictureDirectory(false);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $picture = $this->getValue('picture');

        if (!is_null($picture)) {

            $sizes = sfConfig::get('app_imagesizes_fit');

            $old = $picture->getSavedName();
            $img = new sfImage($old, $picture->getType());
            $img->thumbnail($sizes['width'], $sizes['height'], 'center');
            $img->saveAs($directory . DIRECTORY_SEPARATOR . $article->getPicture());

            @unlink($old);
        }

        $this->getObject()->refresh(true);

    }

}
