<?php

/**
 * Sponsor form.
 *
 * @author     Your name here
 *
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SponsorForm extends BaseSponsorForm
{
    public function configure()
    {
        $this->usefields(array(
            'name',
            'picture',
            'link',
        ));

        // avatar
        $this->widgetSchema['picture'] = new sfWidgetFormInputFileEditable(array(
          'file_src' => $this->getObject()->retrievePictureUrl(),
          'is_image' => true,
          'edit_mode' => !$this->isNew() && null != $this->getObject()->getPicture(),
          'template' => '<div class="img-thumbnail marged-bottom">%file%</div>%input%',
        ));

        $this->validatorSchema['picture'] = new sfValidatorFileImage(array(
            'required' => false,
            'path' => sfConfig::get('sf_upload_dir').'/sponsors',
            'min_height' => 0,
            'min_width' => 0,
            'max_height' => 99999999,
            'max_width' => 99999999,
            'mime_types' => 'web_images',
        ));
    }

    public function doSave($con = null)
    {
        parent::doSave($con);

        $event = $this->getObject();

        $directory = $event->retrieveHashedPictureDirectory(false);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $picture = $this->getValue('picture');

        if (!is_null($picture)) {
            $old = $picture->getSavedName();
            $img = new sfImage($old, $picture->getType());
            $img->saveAs($directory.DIRECTORY_SEPARATOR.$event->getPicture());

            @unlink($old);
        }

        $this->getObject()->refresh(true);
    }
}
