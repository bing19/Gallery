<?php
setlocale(LC_ALL, 'ru_RU.UTF-8');

include_once 'autoloader.php';

$url = ltrim($_SERVER['REQUEST_URI'], '/');
$url = explode('?', $url);
$url = $url[0];
$gallery = new \Classes\Gallery();
$images = $gallery->getAllImg();

switch ($url) {
    case 'postimg':
        if(!empty($_FILES)){
            $gallery->downloadImg($_FILES);
        }
        break;
    case 'image':

        include 'template/image.php';
        break;
    default:

        include 'template/gallery.php';
        break;
}




?>


