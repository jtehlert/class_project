<?php

if (isset($_GET)) {
  $id = 'clipping-' . $_GET['id'];
  $name = $_GET['name'];
  $subtitle = $_GET['subtitle'];
  $markup = '
<a href="">
  <div id="' . $id . '" class="sidebar-list-cell">
    <div class="title">
      ' . $name . '
    </div>
    <div class="subtitle">
      ' . $subtitle . '
    </div>
  </div>
</a>';

  print $markup;
}
