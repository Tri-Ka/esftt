<?php

class homepageComponents extends sfComponents
{
    public function executeSignin(sfWebRequest $request)
    {

        $this->form = new sfGuardFormSigninFe();

    }

    public function executeSlider(sfWebRequest $request)
    {

		$this->dir = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'slides';

		$this->images = array_merge(
            glob($this->dir.DIRECTORY_SEPARATOR."*.jpg"),
            glob($this->dir.DIRECTORY_SEPARATOR."*.JPG")
        );

        $this->pictures = array();

        foreach ($this->images as $image) {
            $directoryName = $this->dir;
            $imageName = str_replace($this->dir, '', $image);

            $this->pictures[] = $imageName;
        }

    }


}
