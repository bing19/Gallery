<?php
/**
 * Created by PhpStorm.
 * User: davidoff
 * Date: 10.09.17
 * Time: 17:09
 */

namespace Classes;


class Image
{
    public $imgName;

    public function __construct($file)
    {
        $this->imgName = $file;
    }
}