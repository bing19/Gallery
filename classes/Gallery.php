<?php

namespace Classes;

class Gallery
{
    private $images = [];
    private $imgDir = APP_ROOT . DS . 'img';
    private $imgType = ['image/jpeg','image/jpg','image/png'];

    function getAllImg() {
        $dh = opendir($this->imgDir);
        if (false !== $dh) {
            $count = 0;
            while (($file = readdir($dh)) !== false) {

                if (($file !== '.') && ($file !== '..') && ($file !== 'tumbs')) {
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
        if ($uploaded['name'] == '') {
            return false;
        }
        if($uploaded['size'] > 10000000) {
            echo 'Слишком большой размер';
            return false;
        }
        if(false == in_array($uploaded['type'], $this->imgType)) {
            echo 'Вы загружаете не картинку';
            return false;
        }
        if($uploaded['error'] == 0) {
            move_uploaded_file($uploaded['tmp_name'], APP_ROOT . DS . 'img' . DS . $uploaded['name']);
            $this->image_resize(APP_ROOT . DS . 'img' . DS . $uploaded['name'], APP_ROOT . DS . 'img/tumbs' . DS .  'tumb-' . $uploaded['name'], false, 200);
        }
        header( "location: / ");
    }

    public function image_resize(
        $source_path,
        $destination_path,
        $newwidth=false,
        $newheight = FALSE,
        $quality = FALSE // качество для формата jpeg
    ) {

        ini_set("gd.jpeg_ignore_warning", 1); // иначе на некотоых jpeg-файлах не работает

        list($oldwidth, $oldheight, $type) = getimagesize($source_path);

        switch ($type) {
            case IMAGETYPE_JPEG: $typestr = 'jpeg'; break;
            case IMAGETYPE_GIF: $typestr = 'gif' ;break;
            case IMAGETYPE_PNG: $typestr = 'png'; break;
        }


        $function = "imagecreatefrom$typestr";
        $src_resource = $function($source_path);

        if (!$newheight) { $newheight = round($newwidth * $oldheight/$oldwidth); }
        elseif (!$newwidth) { $newwidth = round($newheight * $oldwidth/$oldheight); }
        $destination_resource = imagecreatetruecolor($newwidth,$newheight);

        imagecopyresampled($destination_resource, $src_resource, 0, 0, 0, 0, $newwidth, $newheight, $oldwidth, $oldheight);

        if ($type = 2) { # jpeg
//            imageinterlace($destination_resource, 1); // чересстрочное формирование изображение
            imagejpeg($destination_resource, $destination_path);
        }
        else { # gif, png
            $function = "image$typestr";
            $function($destination_resource, $destination_path);
        }

        imagedestroy($destination_resource);
        imagedestroy($src_resource);
    }


}