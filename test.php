<?php

$tabArray = convertFblaTab('CA-1_FBL_CASECT13_Registrants_1630123.xls');
getStudentsWhoRequireTranscripts($tabArray);
//print_r(filterBySection($tabArray, 'Beta'));
//print_r($tabArray);


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
  foreach($registrantArray as $key => $value) {
    if ($value[12] !== $section) {
      unset($registrantArray[$key]);
    }
  }
  return $registrantArray;
}

function getStudentsWhoRequireTranscripts($registrantArray) {
  $studentsThatNeedTranscripts = array();
  foreach($registrantArray as $key => $value) {
    if ($value[15] == "Accounting I") {
      $studentsThatNeedTranscripts[] = $value;
    }
  }
  print_r($studentsThatNeedTranscripts);
}

?>
