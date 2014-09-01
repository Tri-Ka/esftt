<?php

/**
 * Picture form.
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PictureForm extends BasePictureForm
{
	  public function configure()
	  {
	  	    $this->widgetSchema['name'] = new sfWidgetFormInputFileEditable(array(
	          'file_src' => $this->getObject()->retrievePictureUrl(),
	          'is_image' => true,
	          'edit_mode' => !$this->isNew() && null != $this->getObject()->getName(),
	        ));

	        $this->validatorSchema['name'] = new sfValidatorFileImage(array(
	            'required'   => false,
	            'path'       => sfConfig::get('sf_upload_dir').'/articles',
	            'min_height' =>  0,
	            'min_width'  =>  0,
	            'max_height' =>  99999999,
	            'max_width'  =>  99999999,
	            'mime_types' => 'web_images',
	        ));

	        $this->validatorSchema['name_delete'] = new sfValidatorBoolean();
	  }

  	/**
     * @see sfFormObject
     */
    public function doSave($con = null)
    {

        parent::doSave($con);

        $picture = $this->getObject();

        $directory = $picture->retrieveHashedPictureDirectory(false);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $pic = $this->getValue('name');

        if (null !== $pic) {

            $old = $pic->gettempName();

            $img = new sfImage($old, $pic->getType());

            $sizes = sfConfig::get('app_imagesizes_picture');

            if($img->getWidth() > $img->getHeight()){
            	$w = $sizes['width'];
            	$h = $sizes['height'];
            } else {
            	$w = $sizes['height'];
            	$h = $sizes['width'];
            }

            $oldFiles = glob($directory . '/*');

            foreach($oldFiles as $file){

              if(is_file($file)){

                unlink($file);

              }

            }

            $img->saveAs($directory . DIRECTORY_SEPARATOR . $picture->getName());
            $img->thumbnail($w, $h, 'scale');

            $thumbDirectory = $directory . DIRECTORY_SEPARATOR . 'thumb/';

            if (!file_exists($thumbDirectory)) {
                mkdir($thumbDirectory);
            }

            $oldFiles = glob($thumbDirectory . '/*');

            foreach($oldFiles as $file){

              if(is_file($file)){

                unlink($file);

              }

            }

            $img->saveAs($directory . DIRECTORY_SEPARATOR . 'thumb/' . $picture->getName());
            @unlink($old);

        }

        $this->getObject()->refresh(true);

    }
}
