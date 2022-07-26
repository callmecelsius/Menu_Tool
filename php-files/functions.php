<?php

//outputs text to pdf
function WriteTextToPDF($pdf, $edit_price, $curr_price)
{
  if (!ctype_space($edit_price) and $edit_price != '') {
    $pdf->Write(0, $edit_price);
  } else {
    $pdf->Write(0, $curr_price);
  }
}

function CreatePage($pdf, $x, $z, $c, $v, $b)
{
  $two_price_arr = array(16, 24, 25, 27, 28);

  $pdf->SetFont('Love', '', $c);
  $start_ind = $v;
  $end_ind = $b;
  $start_pos = [$x[0], $x[1]];
  $spacing = $z;

  $edit_file = simplexml_load_file('../xml/MenuEdits.xml');
  $edit_file2 = simplexml_load_file('../xml/CurrentMenu.xml');

  for ($i = $start_ind; $i < $end_ind; $i++) {
    $edit_price = (string) $edit_file->item[$i]->Price_1; // type conv may be computationally expensive
    $curr_price = (string) $edit_file2->item[$i]->Price_1;

    // logic for items with 2 prices
    if (in_array($edit_file->item[$i]->idNum, $two_price_arr)) {
      // placed in here to hopefully save on computation
      $edit_price_2 = (string) $edit_file->item[$i]->Price_2;
      $curr_price_2 = (string) $edit_file2->item[$i]->Price_2;

      switch ($edit_file->item[$i]->idNum) {
        case 16:
          $pdf->SetXY($start_pos[0] - 2.5, $start_pos[1]);
          break;
        default:
          $pdf->SetXY($start_pos[0] - 4.5, $start_pos[1]);
          break;
      }
      WriteTextToPDF($pdf, $edit_price, $curr_price);

      $pdf->SetXY($start_pos[0], $start_pos[1]);
      WriteTextToPDF($pdf, $edit_price_2, $curr_price_2);
    }
    // default
    else {
      $pdf->SetXY($start_pos[0], $start_pos[1]);
      WriteTextToPDF($pdf, $edit_price, $curr_price);
    }

    $start_pos[1] += $spacing;
  }

  
}

function CreatePNG()
{
  $absolute_path = realpath("../pdfs/generated.pdf");
  $absolute_path2 = realpath("../exports/temp.txt");
  $adj_path = str_replace('temp.txt','',$absolute_path2);

  echo $absolute_path2;

  $img = new Imagick();
  $img->setResolution(150, 150);
  $img->readImage("{$absolute_path}");
  // $img->writeImage('generated.png');

  foreach ($img as $i => $img) {
    $img->writeImage("/{$adj_path}/generated{$i}.png");
  }


  
}
