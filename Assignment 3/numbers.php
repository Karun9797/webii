<?php
    $filename = "numbers.txt";

    $numbers = [];
    for ($i = 0; $i < 100; $i++) {
        $numbers[] = rand(1, 20);
    }

    file_put_contents($filename, implode(" ", $numbers));

    echo "100 random numbers written to file." . "<br>";

    $handle = fopen($filename, "r");
    if (!$handle) {
        die("Failed to open the file.");
    }

    $numberCounts = [];

    while (!feof($handle)) {
        $line = fread($handle, 100);
        $chunkNumbers = preg_split('/\s+/', trim($line));

        foreach ($chunkNumbers as $num) {
            if (is_numeric($num)) {
                $numberCounts[$num] = ($numberCounts[$num] ?? 0) + 1;
            }
        }
    }
    fclose($handle);

    echo "Numbers that occurred an odd number of times: "."<br>";
    foreach ($numberCounts as $num => $count) {
        if ($count % 2 !== 0) {
            echo "$num occurred: $count times," . " <br> ";
        }
    }
?>