<?php
namespace Hasarius\test;

require('../Hasarius/autoloader.php');
use Hasarius\AutoLoader;
use Hasarius\system\MakeConst;

$autoloader = new Autoloader();
$autoloader->autoload();

define("FLAG_UNIT_TEST", 1);
define("HASARIUS_TEST_DIR", __DIR__);
define('HASARIUS_BASE_DIR', HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "Hasarius");
MakeConst::load(HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "const.json");
MakeConst::loadMakeFile(HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "make.json");

define('HASARIUS_PREPROCESS_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'preprocess');
define('HASARIUS_SYSTEM_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'system');
define('HASARIUS_UTILS_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'utils');
define('HASARIUS_COMMANDS_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'commands');
define('HASARIUS_DECORATION_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'decorations');
