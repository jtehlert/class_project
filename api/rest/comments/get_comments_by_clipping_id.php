<?php

require_once(dirname(__FILE__) . '/../../comment.php');

if (isset($_GET['cid'])) {
  print(json_encode(getCommentsByClippingId($_GET['cid'])));
}
else {
  echo json_encode(array(400 => "Invalid arguments"));
}
