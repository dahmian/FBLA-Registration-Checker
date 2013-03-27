<?php
function filterByColumnValue($sourceArray, $columnNumbers, $stringMatchs) {
  foreach($sourceArray as $sourceKey => $sourceValue) {
    foreach($columnNumbers as $columnKey => $columnValue) {
      foreach($stringMatchs as $matchKey => $matchValue) {
        if ($sourceValue[$columnValue] == $matchValue) {
          $filteredArray["ID-$sourceValue[0]"] = $sourceValue; //if key like an int, PHP will store it like an int
        }
      }
    }
  }
  return $filteredArray;
}
?>
