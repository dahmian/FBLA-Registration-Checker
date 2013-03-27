<?php
require 'filter-by-column-value.php';

function filterBySection($registrantArray, $section) {
  return filterByColumnValue($registrantArray, array('District/Section'), array($section));
}

function getStudentsWhoRequireTranscripts($registrantArray) {
    $eventsThatRequireTranscripts = array(
      'Accounting I'
    );
    return filterByColumnValue($registrantArray, array('Event1', 'Event2'), $eventsThatRequireTranscripts);
}

function getStudentsWhoRequireGradeProof($registrantArray) {
   $eventsThatRequireProofOfGrade = array(
     'Business Math',
     'Creed',
     'FBLA Principles and Procedures',
     'Introduction to Business',
     'Introduction to Business Communication',
     'Introduction to Parliamentary Procedure',
     'Introduction to Technology Concepts',
     'Word Processing I',
     'Public Speaking I'
   );
   return filterByColumnValue($registrantArray, array('Event1', 'Event2'), $eventsThatRequireProofOfGrade);
}
?>
