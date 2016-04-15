<!DOCTYPE html>
<html>
<head>
    <title>Arrays</title>
</head>
<body>
<h1> Arrays </h1>
<?php
$numbers = array('one' => 1, 'two' => 2, 'three' => 3);
$numbersLanguages = [
    [
        'one' => 'uno',
        'two' => 'dos',
        'three' => 'tres'
    ],
    [
        'one' => 'viena',
        'two' => 'du',
        'three' => 'tris'
    ]
];

echo 'array_change_key_case' . "<br>";
print_r(array_change_key_case($numbers, CASE_UPPER));
echo "<br>";

echo 'array_chunk' . "<br>";
echo 'makes array split into pieces' . "<br>";
print_r(array_chunk($numbers, 1));
echo "<br>";

echo 'array column' . "<br>";
print_r(array_column($numbersLanguages, 'one'));
echo "<br>";

echo 'array_combine' . "<br>";
print_r(array_combine($numbers, $numbersLanguages[1]));
echo "<br>";

echo 'array_count_values' . "<br>";
echo 'this is useful when you can have multiple values' . "<br>";
$array = array(1, "hello", 1, "world", "hello", "hello");
print_r(array_count_values($array));
echo "<br>";

echo 'Array fill' . "<br>";

$a = array_fill(5, 6, 'banana');
$b = array_fill(-2, 4, 'pear');
print_r($a);
echo "<br>";

print_r($b);
echo "<br>";

?>
</body>
</html>