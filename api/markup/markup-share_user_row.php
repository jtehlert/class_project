<?php
if (isset($_GET['id']) && isset($_GET['fname']) && isset($_GET['lname'])) {
  $id = 'user-' . $_GET['id'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $markup = '
<a id="' . $id . '" onclick="clickUser(this.id)" class="user-share-list-link">
  <div  class="user-share-list-cell">
    <div class="name">
      ' . $fname . ' ' . $lname . '
    </div>
  </div>
</a>';
  print $markup;
}
