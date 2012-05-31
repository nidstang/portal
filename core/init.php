<?php
require_once("config.php");

define('PATH_LIBRARY', $config['pathLinux']);

set_include_path(get_include_path() . PATH_SEPARATOR . PATH_LIBRARY);

require_once 'spoon/spoon.php';
