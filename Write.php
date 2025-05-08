<?php
$file = fopen("Sample1.txt", "a");
fwrite($file, "This is a Sample1 file.\n");
fwrite($file, "This is a Sample2 file.");
fclose($file);
?>