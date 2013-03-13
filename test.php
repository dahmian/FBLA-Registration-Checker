<?php

$tabArray = convertFblaTab('test.tab');

print_r(
  getStudentsWhoRequireTranscripts(
    filterBySection($tabArray, 'Alpha')
  )
);

//TODO filterByMultipleColumns


function convertFblaTab($fileName) {
  $fileContents = file_get_contents($fileName);
  $lines = explode("\n", $fileContents);
  foreach($lines as $key => $value){
    $row = explode("\t", $value);
    $tabArray[$row[0]] = $row;
  }
  return $tabArray;
}

function filterBySection($registrantArray, $section) {
  return filterByColumnValue($registrantArray, array(12), $section);
}

function getStudentsWhoRequireTranscripts($registrantArray) {
    return filterByColumnValue($registrantArray, array(15, 17), "Accounting I");
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
   $filteredArray = array();
   foreach($eventsThatRequireProofOfGrade as $key => $value) {
     $eventOne = filterByColumnValue($registrantArray, 15, $value);
     if (count($eventOne) > 0) {
      $filteredArray = array_merge($filteredArray, $eventOne);
     }
   }
   return $filteredArray;
}

function filterByColumnValue($sourceArray, $columnNumber, $stringMatch) {
  $filteredArray = array();
  foreach($sourceArray as $key => $value) {
    foreach($columnNumber as $columnKey => $columnValue) {
      if ($value[$columnValue] == $stringMatch) {
        $filteredArray[$value[0]] = $value;
      }
    }
  }
  return $filteredArray;
}

?>
