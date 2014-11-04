<?php
require_once(dirname(__FILE__) . '/../../config.php');

if (isset($_GET['id']) && isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['shared'])) {
  $id = 'user-' . $_GET['id'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $shared = ($_GET['shared'] == "true") ? TRUE : FALSE;
  $classmod = $shared ? 'user-previously-shared' : 'user-share';
  $img = $shared ? '<img class="user-selected-check" src="http://' . $_SERVER['HTTP_HOST'] . $_IWP_DIR_ . '/assets/images/check-256.png" />' : '';
  $markup = '
<a id="' . $id . '" onclick="clickUser(this.id)" class="' . $classmod . '-list-link">
  <div  class="' . $classmod . '-list-cell">
    <img class="user-selected-check" src="http://' . $_SERVER['HTTP_HOST'] . $_IWP_DIR_ . '/assets/images/checkmark.png" />
    <div class="name">
      ' . $fname . ' ' . $lname . '
    </div>
  </div>
</a>';
  print $markup;
}
