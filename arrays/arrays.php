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
?>

<h3>array_change_key_case</h3>
<p>Changes the case of the keys, upper case or lower case.</p>
<pre><? print_r($numbers); ?></pre>
<p>array_change_key_case($numbers, CASE_UPPER)</p>
<pre><? print_r(array_change_key_case($numbers, CASE_UPPER)); ?> </pre>

<h3>array_chunk</h3>
<p>makes array split into pieces</p>
<p>print_r(array_chunk($numbers, 1));</p>
<pre><? print_r(array_chunk($numbers, 1)); ?></pre>



<h3>array_column</h3>
<p>Takes the values on the array key and makes into an array, very useful in sql queries</p>
<p>array_column($numbersLanguages, 'one')</p>
<pre><? print_r($numbersLanguages) ?></pre>

<pre><? print_r(array_column($numbersLanguages, 'one')); ?></pre>
<?php

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