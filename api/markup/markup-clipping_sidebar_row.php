<?php
if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['subtitle'])) {
  $id = 'clipping-' . $_GET['id'];
  $name = $_GET['name'];
  $subtitle = $_GET['subtitle'];
  $markup = '
<a id="' . $id . '" onclick="clickClipping(this.id)" class="sidebar-list-link">
  <div  class="sidebar-list-cell">
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
