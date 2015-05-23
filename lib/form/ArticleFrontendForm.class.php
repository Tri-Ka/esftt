<?php

/**
 * Article form.
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleFrontendForm extends ArticleForm
{
	public function configure()
	{
  		$this->usefields(
  			array(
				'title',
				'sub_title',
				'content',
				'is_published',
				'picture'
			)
		);

		// illustration
        $sizes = sfConfig::get('app_imagesizes_article_picture');
        $this->widgetSchema['picture'] = new sfWidgetFormInputFileEditable(array(
          'file_src' => $this->getObject()->retrievePictureUrl(),
          'is_image' => true,
          'edit_mode' => !$this->isNew() && null != $this->getObject()->getPicture(),
        ));

        $this->validatorSchema['picture'] = new sfValidatorFile(array(
            'required'   => false,
            'path'       => sfConfig::get('sf_upload_dir').'/avatars',
            'mime_types' => 'web_images',
        ));

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

            $sizes = sfConfig::get('app_imagesizes_article_picture');

            $old = $picture->getSavedName();
            $img = new sfImage($old, $picture->getType());
            $img->thumbnail($sizes['width'], $sizes['height'], 'center');
            $img->saveAs($directory.DIRECTORY_SEPARATOR.$article->getPicture());

            if (file_exists($old)) {
                unlink($old);
            }
        }

        $this->getObject()->refresh(true);
    }
}
