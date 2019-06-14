<?php 
require_once "vendor/autoload.php";

use \Slim\Slim;
use \App\Page;

$app = new Slim();

$app->get("/", function() {
	$page = new Page();

	$page->setTpl('index');
});

$app->get("/teste", function() {
	$page = new Page();

	$page->setTpl();
});

$app->run();
 
 ?>