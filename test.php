<?php
$fileName = "test.tab";
$fileContents = file_get_contents($fileName);
$lines = explode("\n", $fileContents);
$i= 0;
foreach($lines as $key => $value){
  $tabArray[$i] = explode("\t", $value);
  $i++;
}
print_r($tabArray);

print('Last name is: ' . $tabArray[1][1]);
?>
