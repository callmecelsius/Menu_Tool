<?php

// include 'classes.php';
include '../php-files/functions.php';

$banh = 0;
$snacks = 7;
$slim = 19;
$entree = 23;
$dessert = 27;
$dessert_drink = 31;
$frozen = 37;
$fusion = 46;
$milk = 48;
$four = 53;
$coffee = 62;
$topping = 65;

// $_banh = new MENU_SECTION();
// $_snacks = new MENU_SECTION();
// $_slim = new MENU_SECTION();
// $_entree = new MENU_SECTION();
// $_dessert = new MENU_SECTION();
// $_dessert_drink = new MENU_SECTION();
// $_frozen = new MENU_SECTION();
// $_fusion = new MENU_SECTION();
// $_milk = new MENU_SECTION();
// $_four = new MENU_SECTION();
// $_coffee = new MENU_SECTION();
// $_topping = new MENU_SECTION();

//start_xy, price2_gap, font_size, start_ind
// $_banh->SetValues(array(16.74, 20.35), 1.16, 69,$banh);

// $chunky_boi = array($banh, $snacks, $slim, $entree, $dessert, $dessert_drink, $frozen, $fusion, $milk, $four, $coffee, $topping);
$create_backup = simplexml_load_file('../xml/CurrentMenu.xml');
file_put_contents('../xml/backup.xml', $create_backup->asXML());

include 'tv-menus.php';

include 'online-menu.php';

CreatePNG();

$rootPath = realpath('../exports');

// Initialize archive object
$zip = new ZipArchive();
$zip->open('../file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

$files = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($rootPath),
  RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
  // Skip directories (they would be added automatically)
  if (!$file->isDir()) {
    // Get real and relative path for current file
    $filePath = $file->getRealPath();
    $relativePath = substr($filePath, strlen($rootPath) + 1);

    // Add current file to archive
    $zip->addFile($filePath, $relativePath);
  }
}

$zip->close();

$file2 = '../file.zip';
ob_clean();
header("Content-Disposition: attachment; filename=\"{$file2}\"");
header('Content-Type: application/zip');
header('Content-Length: '.filesize($file2));
flush();
readfile($file2);
unlink($filename);
header("location: ../file.zip");



?>
