<?php

session_start();

$_SESSION["User"]["iduser"] = "14";
//$_SESSION["User"]["idperson"] = "14";
//$_SESSION["User"]["deslogin"] = "admin";
//$_SESSION["User"]["despassword"] = '$2y$12$JzJbE1QffCXUV0lYXgF4TuPgJu6KkfVJMwQChh67UcOyGjUfi7Z7.';
$_SESSION["User"]["inadmin"] = true;
//$_SESSION["User"]["dtregister"] = "2020-04-23 17:03:00";

require_once("vendor/autoload.php");

use Slim\Slim; // namespace

$app = new Slim();

$app->config('debug', false);

require_once("site.php");
require_once("orc.php");
require_once("orc-users.php");
require_once("orc-forgot.php");
require_once("orc-categories.php");
require_once("orc-products.php");
require_once("functions.php");

$app->run();

 ?>