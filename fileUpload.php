<?php
require './test.php';

$uploadedFile = $_FILES["file"]["tmp_name"];
renderFromTabFile($uploadedFile);
?>