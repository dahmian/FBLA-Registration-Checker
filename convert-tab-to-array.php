<?php
function convertTabFileToArray($fileName) {
  $fileContents = file_get_contents($fileName);
  $lines = explode("\n", $fileContents);
  foreach($lines as $key => $value){
    $row = explode("\t", $value);
    $row = mapColumnNames($row);
    $tabArray[$row[0]] = $row;
  }
  return $tabArray;
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
