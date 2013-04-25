<?php
require './student-query.php';
require './render-students.php';
require './convert-tab-to-array.php';

function renderFromTabFile($file) {
  $tabArray = convertTabFileToArray($file);
  $data = getStudentsInImpromptuSpeaking($tabArray);
  renderStudents($data);
}
?>
