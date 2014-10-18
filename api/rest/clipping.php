<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/api/clipping.php');

if (isset($_GET['id'])) {
  print(json_encode(getClippingById($_GET['id'])));
} elseif (isset($_GET['uid'])) {
  print(json_encode(getClippingsByUserId($_GET['uid'])));
} elseif (isset($_GET['name']) && $_GET['filetype'] && $_GET['id']){
  print(json_encode(saveClipping($_GET['name'], $_GET['uid'], $_GET['origfile'], $_GET['coordinates'])));
} elseif (isset($_GET['fid'])) {
  print(json_encode(accessClipping($_GET['fid'])));
}
