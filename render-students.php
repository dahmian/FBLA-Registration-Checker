<?php
require 'mustache.php/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

function renderStudents($data) {
  $template_data['students'] = new ArrayIterator($data); 
  $m = new Mustache_Engine;
  $template = file_get_contents('views/students.mustache');
  echo $m->render($template, $template_data);
}
?>
