<?php

namespace Classes;

class Gallery
{
    public $images = [];
    private $imgDir = APP_ROOT . DS . 'img';

    function getAllImg() {
        $dh = opendir($this->imgDir);
        if (false !== $dh) {
            $count = 0;
            while (($file = readdir($dh)) !== false) {

                if (($file !== '.') && ($file !== '..')) {
                    $count++;
                    $this->images[$count] = new Image ($file);
                }
            }
        }
        closedir($dh);
        return $this->images;
    }


    public function downloadImg($img) {
        $uploaded = $img['newimage'];
        if($uploaded['error'] == 0) {
            move_uploaded_file($uploaded['tmp_name'], APP_ROOT . DS . 'img' . DS . $uploaded['name']);
        }
        header( "location: / ");
    }


}