<?php
require 'student-query.php';
require 'render-students.php';
require 'convert-tab-to-array.php';

$tabArray = convertTabFileToArray('test.tab');
$data = getStudentsWhoRequireGradeProof(
    filterBySection($tabArray, 'Alpha')
);
renderStudents($data);
?>
