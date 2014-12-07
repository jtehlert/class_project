<?php

require_once(dirname(__FILE__) . '/../shared_clipping.php');
require_once(dirname(__FILE__) . '/../../config.php');
if (isset($_GET['id']) && isset($_GET['uid']) && isset($_GET['name']) && isset($_GET['subtitle'])) {

  $id = 'clipping-' . $_GET['id'];
  $uid = $_GET['uid'];
  $name = $_GET['name'];
  $subtitle = $_GET['subtitle'];
  $shared = isClippingSharedWIthUser($_GET['id'], $uid);
  $cell_class = 'sidebar-list-cell-notebook';

  $markup = '
<a id="' . $id . '" onclick="" class="sidebar-list-link">
  <div  class="' . $cell_class . '">
    <div class="sidebar-list-cell-interior-padding">
      <div class="title">
        ' . $name . '
      </div>
    </div>
  </div>
</a>';
  print $markup;
}
