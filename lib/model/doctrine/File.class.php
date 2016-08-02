<?php

/**
 * File.
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @author     Your name here
 *
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class File extends BaseFile
{
    /**
     * Retrieve file path.
     *
     * @param bool $web
     *
     * @return string
     */
    public function retrieveFileUrl($web = true)
    {
        $dirSep = $web ? '/' : DIRECTORY_SEPARATOR;

        return $this->retrieveFileDirectory($web).$dirSep.$this->getFileName();
    }

    /**
     * Retrieve file directory only.
     *
     * @param bool $web for web path or not
     *
     * @return string file directory
     */
    public function retrieveFileDirectory($web = true)
    {
        $dirSep = $web ? '/' : DIRECTORY_SEPARATOR;

        return $this->retrieveDirectory($web).$dirSep.'files';
    }

    /**
     * Retrieve directory for idea documents (files and logo).
     *
     * @param bool $web
     *
     * @return string
     */
    public function retrieveDirectory($web = true)
    {
        if ($web) {
            $dirSep = '/';
            $dirPrefix = str_replace(sfConfig::get('sf_web_dir'), '', sfConfig::get('sf_upload_dir'));
            sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url'));

            return public_path(implode($dirSep, array_merge_recursive(array($dirPrefix, 'files'), str_split($this->getId()))), true);
        } else {
            $dirSep = DIRECTORY_SEPARATOR;
            $dirPrefix = sfConfig::get('sf_upload_dir');

            return implode($dirSep, array_merge_recursive(array($dirPrefix, 'files'), str_split($this->getId())));
        }
    }
}
