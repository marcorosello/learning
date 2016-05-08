<?php

//Most of type errors will only show up in runtime as there is no precompile process.
//However the AST will allow static analysers to pick up those issues before you run the function.
//This would be very useful to avoid errors that are hard to get, for example if you get the string false that would be
//converted to true. Obviously that is not what you expect

require '/var/www/default/php-ast/util.php';
$filename = 'ASTexample.php';
$ast = ast\parse_file($filename, $version=30);
$opcodes = `phpdbg -p {$filename}`

?>
<pre> <?= ast_dump($ast); ?></pre>
<pre> <?= $opcodes ?></pre>
