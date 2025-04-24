$fruits = ["Apple", "Banana", "Mango"];

for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i] . "<br>";
}

$i = 0;
while ($i < count($fruits)) {
    echo $fruits[$i] . "<br>";
    $i++;
}

$i = 0;
do {
    echo $fruits[$i] . "<br>";
    $i++;
} while ($i < count($fruits));

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
