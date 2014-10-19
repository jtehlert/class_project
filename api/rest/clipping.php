<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/api/clipping.php');

if (isset($_GET['id']) && isset($_GET['content'])) {
  print(json_encode(getClippingContent($_GET['id'])));
} elseif (isset($_GET['id'])) {
  print(json_encode(getClippingById($_GET['id'])));
} elseif (isset($_GET['userId']) && isset($_GET['file']) && isset($_GET['content']) && isset($_GET['name']) && isset($_GET['subtitle'])) {
    print(json_encode(saveClipping($_GET['userId'], $_GET['file'], $_GET['content'], $_GET['name'], $_GET['subtitle'])));
} elseif (isset($_GET['uid'])) {
  print(json_encode(getClippingsByUserId($_GET['uid'])));
} elseif (isset($_GET['fid'])) {
  print(json_encode(accessClipping($_GET['fid'])));
}
