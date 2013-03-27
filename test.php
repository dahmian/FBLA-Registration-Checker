<?php
require 'mustache.php/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

include 'convert-tab-to-array.php';
$tabArray = convertTabFileToArray('test.tab');

print_r(
  getStudentsWhoRequireGradeProof(
    filterBySection($tabArray, 'Alpha')
  )
);
$m = new Mustache_Engine;
$template = file_get_contents('test.mustache');
echo $m->render($template, array('planet' => 'World'));

function filterBySection($registrantArray, $section) {
  return filterByColumnValue($registrantArray, array(12), array($section));
}

function getStudentsWhoRequireTranscripts($registrantArray) {
    return filterByColumnValue($registrantArray, array(15, 17), array("Accounting I"));
}

function getStudentsWhoRequireGradeProof($registrantArray) {
   $eventsThatRequireProofOfGrade = array(
     'Business Math',
     'Creed',
     'FBLA Principles and Procedures',
     'Introduction to Business',
     'Introduction to Business Communication',
     'Introduction to Parliamentary Procedure',
     'Introduction to Technology Concepts',
     'Word Processing I',
     'Public Speaking I'
   );
   return filterByColumnValue($registrantArray, array(15, 17), $eventsThatRequireProofOfGrade);
}

function filterByColumnValue($sourceArray, $columnNumbers, $stringMatchs) {
  $filteredArray = array();
  foreach($sourceArray as $sourceKey => $sourceValue) {
    foreach($columnNumbers as $columnKey => $columnValue) {
      foreach($stringMatchs as $matchKey => $matchValue) {
        if ($sourceValue[$columnValue] == $matchValue) {
          $filteredArray["'$sourceValue[0]'"] = $sourceValue; //if key like an int, PHP will store it like an int
        }
      }
    }
  }
  return $filteredArray;
}
?>
