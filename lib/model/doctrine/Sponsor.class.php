<?php

/**
 * Sponsor.
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @author     Your name here
 *
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Sponsor extends BaseSponsor
{
    /**
     * Retrieve picture path.
     *
     * @return string avatar path
     */
    public function retrievePictureUrl($web = true, $big = false)
    {
        $logo = $this->getPicture();

        if (null == $logo) {
            if (false == $big) {
                return  'http://fakeimg.pl/320x320';
            } else {
                return  'http://fakeimg.pl/750x320';
            }
        }

        $dirSep = DIRECTORY_SEPARATOR;

        if (true == $big) {
            return $this->retrieveHashedPictureDirectory($web).$dirSep.'big'.$dirSep.$logo;
        } else {
            return $this->retrieveHashedPictureDirectory($web).$dirSep.$logo;
        }
    }

    /**
     * Retrieve picture directory only.
     *
     * @return string avatar directory only
     */
    public function retrieveHashedPictureDirectory($web = true)
    {
        if ($web) {
            $dirSep = '/';
            $dirPrefix = str_replace(sfConfig::get('sf_web_dir'), '', sfConfig::get('sf_upload_dir'));
            sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url'));

            return public_path(implode($dirSep, array_merge_recursive(array($dirPrefix, 'sponsors'), str_split($this->getId()))), true);
        } else {
            $dirSep = DIRECTORY_SEPARATOR;
            $dirPrefix = sfConfig::get('sf_upload_dir');

            return implode($dirSep, array_merge_recursive(array($dirPrefix, 'sponsors'), str_split($this->getId())));
        }
    }
}
