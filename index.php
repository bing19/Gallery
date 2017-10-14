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



//$string = file('file.txt');
//$page = isset($_GET['page']) ? $_GET['page'] : 1;
//$onpage = 5;
//$start = ($page - 1) * $onpage;
//$comments = array_slice($string, $start, $onpage);
//var_dump($comments);

?>


