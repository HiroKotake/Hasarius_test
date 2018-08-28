<?php
namespace Hasarius\test;

require('../Hasarius/autoloader.php');
use Hasarius\AutoLoader;

$autoloader = new Autoloader();
$autoloader->autoload();

define('HASARIUS_BASE_DIR', "../Hasarius");
define('HASARIUS_PREPROCESS_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'preprocess');
define('HASARIUS_SYSTEM_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'system');
define('HASARIUS_UTILS_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'utils');
define('HASARIUS_COMMANDS_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'commands');
define('HASARIUS_DECORATION_DIR', HASARIUS_BASE_DIR . DIRECTORY_SEPARATOR . 'decorations');

// (ダミー) 作成するDocument Type を設定
define('CURRENT_DOCUMENT_DATA', 'HTML4_LOOSE');
define('MAKE_DocumentType', 'HTML4_LOOSE');
