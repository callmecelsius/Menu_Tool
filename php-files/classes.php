<?php

class MENU_SECTION
{
  public $start_xy;
  public $end_xy;
  public $next_line_xy;
  public $font_size;
  public $sections;
  public $price2_gap;

  function SetValues($a, $s, $d, $f, $g, $h,)
  {
    $this->start_xy = $a;
    $this->price2_gap = $s;
    $this->font_size = $d;
    $this->start_ind = $f;
    // 2price gap
    // if 2 price
    // 
    // $this->start_ind = $g;
    // $this->price2_gap = $h;
  }
}



?>