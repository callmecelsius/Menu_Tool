<?php

// $current_xml = simplexml_load_file('../xml/Current.xml');
$edited_xml = simplexml_load_file('../xml/MenuEdits.xml');
// $empty_xml = simplexml_load_file('../xml/Pandan_Reset.xml');



if (isset($_POST['reset'])) {
  foreach ($edited_xml->item as $node) {
    $node->Price_1 = '';
    $node->Price_2 = '';
  }
  file_put_contents('../xml/MenuEdits.xml', $edited_xml->asXML());
  header("location: ../index.php");
}

if (isset($_POST['transfer'])) {
  $i_button = 0;
  $current_xml = simplexml_load_file('../xml/CurrentMenu.xml');
  foreach ($edited_xml->item as $node) {

    $price1 = $node->Price_1;
    $price2 = $node->Price_2;

    if (!ctype_space($price1) and $price1 != '') {
      $current_xml->item[$i_button]->Price_1 = $node->Price_1;
    }
    if (!ctype_space($price2) and $price2 != '') {
      $current_xml->item[$i_button]->Price_2 = $node->Price_2;
    }
    $i_button ++;
  }
  file_put_contents('../xml/CurrentMenu.xml', $current_xml->asXML());
  header("location: ../index.php");
}


if (isset($_POST['restore'])) {
  $i_button = 0;
  $restore_xml = simplexml_load_file('../xml/Backup.xml');
  $current_xml = simplexml_load_file('../xml/CurrentMenu.xml');
  // foreach ($current_xml->item as $node) {

  //   $node->Price_1= $restore_xml->item->Price_1;
  //   $node->Price_2 = $restore_xml->item->Price_2;

  //   $i_button++;
  // }
  file_put_contents('../xml/CurrentMenu.xml', $restore_xml->asXML());
  header("location: ../index.php");
}

?>