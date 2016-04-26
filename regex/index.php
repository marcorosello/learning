<?php
include('SizeFilter.php');

$file = file_get_contents('sizes.list');
$sizes = explode(PHP_EOL, $file);

$filteredSizes = (new SizeFilter())->filter($sizes);

$listCount = count($sizes);
$filteredListCount = count($filteredSizes);
$filteredCount = (int) $listCount - (int) $filteredListCount;
$percentageReduced = round(($filteredCount / $listCount) * 100, 2);

?>
<pre><?= $listCount ?></pre>
<pre><?= $filteredListCount ?></pre>
<pre><?= $filteredCount ?></pre>
<pre><?= $percentageReduced ?>%</pre>