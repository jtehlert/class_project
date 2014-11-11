<?php

require_once(dirname(__FILE__) . '/../../comment.php');

if (isset($_GET['cid']) && isset($_GET['uid']) && isset($_GET['content'])) {
  print(json_encode(createComment($_GET['cid'], $_GET['uid'], $_GET['content'])));
}
else {
  echo json_encode(array(400 => "Invalid arguments"));
}