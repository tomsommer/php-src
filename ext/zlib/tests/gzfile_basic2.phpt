--TEST--
Test function gzfile() reading a plain relative file
--SKIPIF--
<?php
if (!extension_loaded('zlib')) die ('skip zlib extension not available in this build');
?>
--FILE--
<?php
$plaintxt = <<<EOT
hello world
is a very common test
for all languages
EOT;
$dirname = 'gzfile_temp';
$filename = $dirname.'/gzfile_basic2.txt';
mkdir($dirname);
$h = fopen($filename, 'w');
fwrite($h, $plaintxt);
fclose($h);


var_dump(gzfile( $filename ) );

unlink($filename);
rmdir($dirname);
?>
===DONE===
--EXPECT--
array(3) {
  [0]=>
  string(12) "hello world
"
  [1]=>
  string(22) "is a very common test
"
  [2]=>
  string(17) "for all languages"
}
===DONE===
