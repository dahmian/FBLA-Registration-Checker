<?php
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
