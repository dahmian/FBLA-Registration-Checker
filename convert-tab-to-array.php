<?php
function convertTabFileToArray($fileName) {
  $fileContents = file_get_contents($fileName);
  $lines = explode("\n", $fileContents);
  foreach($lines as $key => $value){
    $row = explode("\t", $value);
    $tabArray[$row[0]] = $row;
  }
  return $tabArray;
}
?>
