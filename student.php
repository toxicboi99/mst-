<?php
$students = array(
    "John" => 85,
    "Sarah" => 92,
    "Mark" => 78,
    "Emily" => 88,
    "David" => 95
);

arsort($students);

foreach ($students as $name => $score) {
    echo "$name: $score\n";
}
?>
