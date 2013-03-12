<?php
$fileName = "test.tab";
$fileContents = file_get_contents($fileName);
$lines = explode("\n", $fileContents);
$i= 0;
foreach($lines as $key => $value){
  $tabArray[$i] = explode("\t", $value);
  $i++;
}

foreach($tabArray as $key => $value) {
  if ($value[12] !== "Alpha") {
    unset($tabArray[$key]);
  }
}

print_r($tabArray);
?>
