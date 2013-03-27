<?php
require 'mustache.php/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

include 'convert-tab-to-array.php';
$tabArray = convertTabFileToArray('test.tab');

$data = getStudentsWhoRequireGradeProof(
    filterBySection($tabArray, 'Alpha')
);
$template_data['students'] = new ArrayIterator($data); 
$m = new Mustache_Engine;
$template = file_get_contents('test.mustache');
echo $m->render($template, $template_data);

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
  foreach($sourceArray as $sourceKey => $sourceValue) {
    foreach($columnNumbers as $columnKey => $columnValue) {
      foreach($stringMatchs as $matchKey => $matchValue) {
        if ($sourceValue[$columnValue] == $matchValue) {
          $sourceValue = mapColumnNames($sourceValue);
          $filteredArray["ID-$sourceValue[0]"] = $sourceValue; //if key like an int, PHP will store it like an int
        }
      }
    }
  }
  return $filteredArray;
}

function mapColumnNames($numberedArray) {
  $map = array(
    'Student Id',
    'First Name',
    'Last Name',
    'School Name',
  );
  foreach($numberedArray as $sourceKey => $sourceValue) {
    foreach($map as $mapKey => $mapValue) {
      if ($sourceKey === $mapKey) {
        $numberedArray = replaceArrayKey($numberedArray, $mapValue, $sourceKey);
      }
    }
  }
  return $numberedArray;

}

function replaceArrayKey($numberedArray, $newKey, $sourceKey) {
  $numberedArray[$newKey] = $numberedArray[$sourceKey];
  return $numberedArray;
}
?>
