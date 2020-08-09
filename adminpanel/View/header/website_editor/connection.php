<?php

// $cn = mysqli_connect("localhost","root","","content_management");
$cn = mysqli_connect("localhost","root","de!1@2#al","doora_db");

define('RANDOM_IMAGE_NUMBER', rand(1,32000));

// echo getcwd();


// define("WEBSITE_EDITOR_SERVER_PATH", '/Applications/XAMPP/xamppfiles/htdocs/DooraCINewWeb/doora/adminpanel/View/header/website_editor/Upload/');
define("WEBSITE_EDITOR_SERVER_PATH", '/var/www/html/doora/adminpanel/View/header/website_editor/Upload/');

// define("WEBSITE_EDITOR_SERVER_URL", 'http://localhost/DooraCINewWeb/doora/adminpanel/View/header/website_editor/Upload/');
define("WEBSITE_EDITOR_SERVER_URL", 'https://doora.app/doora/adminpanel/View/header/website_editor/Upload/');

define('NO_IMAGE_PATH', WEBSITE_EDITOR_SERVER_URL.'noimg.png?'.RANDOM_IMAGE_NUMBER);
// define('NO_IMAGE_PATH', 'website_editor/Upload/noimg.png?'.RANDOM_IMAGE_NUMBER);
// define('NO_IMAGE_PATH', 'Upload/noimg.png?'.RANDOM_IMAGE_NUMBER);

define('SAVED_PATH_ADMIN_NEW', WEBSITE_EDITOR_SERVER_PATH);
// define('SAVED_PATH_ADMIN_NEW', "website_editor/Upload/");
// define('SAVED_PATH_ADMIN_NEW', "Upload/");

define('SAVED_PATH_ADMIN', SAVED_PATH_ADMIN_NEW);
// define('SAVED_PATH_ADMIN', "../DooraCINewWeb/doora_webimgs/");

define('IMAGE_SRC', WEBSITE_EDITOR_SERVER_URL);
// define('IMAGE_SRC', "Upload/");

define('IMAGE_SRC_PATH_NEW', IMAGE_SRC);
// define('IMAGE_SRC_PATH_NEW', "../DooraCINewWeb/doora_webimgs/");



?>