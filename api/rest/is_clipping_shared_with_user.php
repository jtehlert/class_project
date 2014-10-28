<?php

require_once(dirname(__FILE__) . '/../shared_clipping.php');

if (isset($_GET['cid']) && isset($_GET['uid'])) {
  echo json_encode(isClippingSharedWithUser($_GET['cid'], $_GET['uid']));
} else {
  echo json_encode(array(400 => "Invalid arguments"));
}
