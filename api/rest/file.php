<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/api/file.php');

if (isset($_GET['id'])) {
  print(json_encode(getFileById($_GET['id'])));
} elseif (isset($_GET['name'])) {
  print(json_encode(getFileByName($_GET['name'])));
} elseif (isset($_GET['uid'])) {
  print(json_encode(getFilesByUserId($_GET['uid'])));
} elseif (isset($_GET['name']) && $_GET['filetype'] && $_GET['id']){
  print(json_encode(storeFile($_GET['name'], $_GET['filetype'], $_GET['uid'])));
} elseif (isset($_GET['fid'])) {
  print(json_encode(accessFile($_GET['fid'])));
}
