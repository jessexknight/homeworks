<?php
$root = "portfolio";
$iter = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
  RecursiveIteratorIterator::SELF_FIRST,
  RecursiveIteratorIterator::CATCH_GET_CHILD
);
$imgs = array();
foreach ($iter as $path => $file) {
  // add newest dir to object
  if ($file->isDir()) {
    $dir = substr($path, strpos($path, "/") + 1);
    $imgs[$dir] = array();
  }
  if ($file->isFile()) {
    array_push($imgs[$dir],$path);
  }
}
$imgs = json_encode($imgs);
?>
