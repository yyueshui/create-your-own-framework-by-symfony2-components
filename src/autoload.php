<?php
/**
 * Created by PhpStorm.
 * User: HX-ZJ-012
 * Date: 2015/12/4
 * Time: 14:01
 */

require_once dirname(__FILE__).'/../vendor/autoload.php';

use Symfony\Component\ClassLoader\ClassLoader;

$loader = new ClassLoader();
$loader->setUseIncludePath(true);
//$loader->addPrefix('Calendar', __DIR__ . '/src');
//$loader->addPrefix('Felix', __DIR__ . '/src');
$loader->register();