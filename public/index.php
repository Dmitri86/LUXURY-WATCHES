<?php

require '..\config\init.php';
require LIBS .'/functions.php';

new \ishop\App();

throw new \Exception('Страница не найдена', 500);
