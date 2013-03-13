<?php

$tabArray = convertFblaTab('CA-1_FBL_CASECT13_Registrants_1630123.xls');

print_r(
  getStudentsWhoRequireTranscripts(
    filterBySection($tabArray, 'Southern')
  )
);

//TODO filterByMultipleColumns


function convertFblaTab($fileName) {
  $fileContents = file_get_contents($fileName);
  $lines = explode("\n", $fileContents);
  foreach($lines as $key => $value){
    $tabArray[] = explode("\t", $value);
  }
  return $tabArray;
}

function filterBySection($registrantArray, $section) {
  return filterByColumnValue($registrantArray, 12, $section);
}

function getStudentsWhoRequireTranscripts($registrantArray) {
    return filterByColumnValue($registrantArray, 15, "Accounting I");
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
    if ($value[$columnNumber] == $stringMatch) {
      $filteredArray[] = $value;
    }
  }
  return $filteredArray;
}

?>
