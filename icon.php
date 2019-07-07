<?php
  $svg = file_get_contents(get_template_directory() . '/nautilus-icon.svg');
  if (empty($color)) {
    $color = "black";
  }
  if (empty($scale)) {
    $scale = 1;
  }
  if (empty($top)) {
    $top = 0;
  }
  if (empty($left)) {
    $left = 0;
  }
  $breadth = $scale * 90;
  echo sprintf($svg, $breadth, $breadth, $left, $top ,$breadth, $breadth, $scale, $color);
?>
