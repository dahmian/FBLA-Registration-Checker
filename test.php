<?php

$tabArray = convertFblaTab('CA-1_FBL_CASECT13_Registrants_1630123.xls');
//print_r(getStudentsWhoRequireTranscripts($tabArray));
print_r(filterBySection($tabArray, 'Southern'));


function convertFblaTab($fileName) {
  $fileContents = file_get_contents($fileName);
  $lines = explode("\n", $fileContents);
  $i= 0;
  foreach($lines as $key => $value){
    $tabArray[$i] = explode("\t", $value);
    $i++;
  }
  return $tabArray;
}

function filterBySection($registrantArray, $section) {
  return filterByColumnValue($registrantArray, 12, $section);
}

function getStudentsWhoRequireTranscripts($registrantArray) {
    return filterByColumnValue($registrantArray, 15, "Accounting I");
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
