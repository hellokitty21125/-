<?php
require_once 'leancloud-sdk/src/autoload.php';
use \LeanCloud\Client;
use \LeanCloud\Object;
use \LeanCloud\Query;
use \LeanCloud\File;
// 参数依次为 AppId, AppKey, MasterKey
Client::initialize("SgHcsYqoLaFTG0XDMD3Gtm0I-gzGzoHsz", "xdv2nwjUK5waNglFoFXkQcxP", "v3P5xzDa0b5CStO0xX0biHpT");

// get param

$avatar = $_POST['avatar'];
$file = File::createWithUrl("avatar.jpg", $avatar);

$title = $_POST['title'];

// save to leanCloud

$testObject = new Object("Goods");

$testObject->set("title", $title);
$testObject->set("avatarFile", $file);

try {
    $testObject->save();
    echo "Save object success!";
} catch (Exception $ex) {
    echo "Save object fail!";
}


?>

