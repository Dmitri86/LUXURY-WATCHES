<?php

require '..\config\init.php';
require LIBS .'/functions.php';

new \ishop\App();

debug(\ishop\App::$app->getProperties());
