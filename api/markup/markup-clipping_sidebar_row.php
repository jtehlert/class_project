<?php

require_once(dirname(__FILE__) . '/../shared_clipping.php');
if (isset($_GET['id']) && isset($_GET['uid']) && isset($_GET['name']) && isset($_GET['subtitle'])) {

  $id = 'clipping-' . $_GET['id'];
  $uid = $_GET['uid'];
  $name = $_GET['name'];
  $subtitle = $_GET['subtitle'];
  $shared = isClippingSharedWIthUser($_GET['id'], $uid);
  $cell_class = $shared ? 'shared sidebar-list-cell' : 'sidebar-list-cell';

  $markup = '
<a id="' . $id . '" onclick="clickClipping(this.id)" class="sidebar-list-link">
  <div  class="' . $cell_class . '">
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
