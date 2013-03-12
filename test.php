<?php

$tabArray = convertFblaTab('test.tab');
foreach($tabArray as $key => $value) {
  if ($value[12] !== "Alpha") {
    unset($tabArray[$key]);
  }
}

print_r($tabArray);

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
?>
