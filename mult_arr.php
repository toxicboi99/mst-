$students = [
    ["name" => "Alice", "age" => 20],
    ["name" => "Bob", "age" => 22],
    ["name" => "Charlie", "age" => 21]
];

// Using foreach loop
foreach ($students as $student) {
    foreach ($student as $key => $value) {
        echo "$key: $value <br>";
    }
    echo "<hr>";
}
