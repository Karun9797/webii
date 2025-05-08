<?php

$file = fopen("Sample.txt", "r");
// $content = fread($file, filesize("Sample.txt"));
// echo var_dump($file);
// echo $content;
echo fgets($file) . "<br>";
echo fgets($file);
// echo fgetc($file);
// fclose($file);
?>