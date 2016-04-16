<?php
include('SizeFilter.php');


$file = file_get_contents('sizes.list');
$sizes = explode(PHP_EOL, $file);
$filteredSizes = SizeFilter::filter($sizes);

$listCount = count($sizes);
$filteredListCount = count($filteredSizes);
$filteredCount = (int) $listCount - (int) $filteredListCount;
$percentageReduced = round(($filteredCount / $listCount) * 100, 2);
?>
<pre><?= $listCount ?></pre>
<pre><?= $filteredListCount ?></pre>
<pre><?= $filteredCount ?></pre>
<pre><?= $percentageReduced ?>%</pre>


Solution for sizes in different countries.

Add a prefix to the size after filtering like, EU

Or have a table to convert all the sizes, either way has its difficulties.